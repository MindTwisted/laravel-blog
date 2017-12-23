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
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($paginate = null)
    {
        return $paginate ?
            Comment::simplePaginate($paginate) :
            Comment::all();
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

    /**
     * Get filtered comments from DB
     *
     * @param array $filter
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function filter(array $filter)
    {
        $post = $filter['post'];
        $approved = isset($filter['approved']) ?
            $filter['approved'] :
            'APPROVED';

        $comments = Comment
            ::when($post, function ($query) use ($post) {
                return $query->where('post_id', $post);
            })
            ->when($approved === 'NOT_APPROVED',
                function ($query) use ($approved) {
                    return $query->where('approved', false);
                })
            ->get();

        return $comments;
    }
}