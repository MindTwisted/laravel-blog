<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @param CommentRepository $commentRepository
     * @return string
     */
    public function store(StoreCommentRequest $request,
                          CommentRepository $commentRepository)
    {
        $commentRepository->create($request);

        return "Comment was successfully added. It will be published after moderation check.";
    }
}
