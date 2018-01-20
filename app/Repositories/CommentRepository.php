<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;

class CommentRepository
{
    /**
     * Get all comments from DB
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function all(array $filters = [])
    {
        $post = isset($filters['post']) ? $filters['post'] : '';
        $approved = isset($filters['approved']) ? $filters['approved'] : '';

        $comments = Comment
            ::when($post, function ($query) use ($post) {
                return $query->where('post_id', $post);
            })
            ->when($approved && $approved === 'NOT_APPROVED',
                function ($query) use ($approved) {
                    return $query->where('approved', false);
                });

        return $comments;
    }

    /**
     * Create new comment
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request)
    {
        $post = Post::findOrFail($request->input('post'));
        $comment = new Comment($request
            ->only(['author_name', 'author_email', 'body']));

        if (Auth::user()) {
            $comment->approved = true;
        }

        $comment->post()->associate($post);
        $comment->save();

        return $comment;
    }

    /**
     * Delete provided comment
     *
     * @param Comment $comment
     * @throws \Exception
     */
    public function delete(Comment $comment)
    {
        $comment->delete();
    }

    /**
     * Edit provided comment
     *
     * @param Request $request
     * @param Comment $comment
     * @return bool;
     */
    public function update(Request $request,
                           Comment $comment)
    {
        $post = Post::findOrFail($request->input('post'));

        $comment->author_name = $request->input('author_name');
        $comment->author_email = $request->input('author_email');
        $comment->body = $request->input('body');

        $comment->post()->associate($post);
        $isDirty = $comment->isDirty();
        $comment->save();

        return $isDirty;
    }

    /**
     * Approve comment
     *
     * @param Comment $comment
     */
    public function approve(Comment $comment)
    {
        $comment->approved = true;
        $comment->save();
    }
}