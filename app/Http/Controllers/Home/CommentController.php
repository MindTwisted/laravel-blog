<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Http\Requests\EditCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Http\Response
     */
    public function index(CommentRepository $commentRepository)
    {
        $filters = Request::only(['post', 'approved']);
        $comments = $commentRepository->all($filters)->paginate(12);

        return view('home.pages.comments.index',
            compact('comments', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function create(PostRepository $postRepository)
    {
        $user = Auth::user();
        $posts = $postRepository->all()->get();

        return view('home.pages.comments.create', compact('user', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCommentRequest $request
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request,
                          CommentRepository $commentRepository)
    {
        $comment = $commentRepository->create($request);

        return redirect()->route('comments.show', $comment->id)
            ->with('status',
                "Comment was successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('home.pages.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment $comment
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment,
                         PostRepository $postRepository)
    {
        $posts = $postRepository->all()->get();

        return view('home.pages.comments.edit',
            compact('comment', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditCommentRequest $request
     * @param  \App\Comment $comment
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Http\Response
     */
    public function update(EditCommentRequest $request,
                           Comment $comment,
                           CommentRepository $commentRepository)
    {
        $isChanged = $commentRepository->update($request, $comment);

        return $isChanged ?
            redirect()->route('comments.show', $comment->id)
                ->with('status',
                    "Comment was successfully updated") :
            redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @param CommentRepository $commentRepository
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment,
                            CommentRepository $commentRepository)
    {
        $commentRepository->delete($comment);

        return redirect()->route('comments.index')
            ->with('status',
                "Comment was successfully deleted");
    }

    /**
     * Approve comment
     *
     * @param \App\Comment $comment
     * @param CommentRepository $commentRepository
     * @return \Illuminate\Http\Response
     */
    public function approve(Comment $comment,
                            CommentRepository $commentRepository)
    {
        $commentRepository->approve($comment);

        return redirect()->route('comments.index')
            ->with('status',
                "Comment was successfully approved");
    }
}