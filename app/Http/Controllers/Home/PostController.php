<?php

namespace App\Http\Controllers\Home;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function index(PostRepository $postRepository)
    {
        $filters = Request::only(['text', 'category', 'tag', 'order']);
        $posts = $postRepository->all($filters)->latest()->paginate(12);

        return view('home.pages.posts.index',
            compact('posts', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRepository $categoryRepository,
                           TagRepository $tagRepository)
    {
        $categories = $categoryRepository->all()->get();
        $tags = $tagRepository->all()->get();

        return view('home.pages.posts.create',
            compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest $request
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request,
                          PostRepository $postRepository)
    {
        $post = $postRepository->create($request);

        return redirect()->route('posts.show', $post->id)
            ->with('status',
                "Post '{$post->title}' was successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('home.pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,
                         CategoryRepository $categoryRepository,
                         TagRepository $tagRepository)
    {
        $categories = $categoryRepository->all()->get();
        $tags = $tagRepository->all()->get();

        return view('home.pages.posts.edit',
            compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditPostRequest $request
     * @param  \App\Post $post
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request,
                           Post $post,
                           PostRepository $postRepository)
    {
        $isChanged = $postRepository->update($request, $post);

        return $isChanged ?
            redirect()->route('posts.show', $post->id)
                ->with('status',
                    "Post was successfully updated") :
            redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @param PostRepository $postRepository
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,
                            PostRepository $postRepository)
    {
        $postRepository->delete($post);

        return redirect()->route('posts.index')
            ->with('status',
                "Post with title '{$post->title}' was successfully deleted");
    }

    /**
     * Delete current post image
     *
     * @param Post $post
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function deleteImage(Post $post,
                                PostRepository $postRepository)
    {
        $postRepository->deleteImage($post);

        return response("Image from post '{$post->title}' was successfully deleted", 200)
            ->header('Content-Type', 'text/plain');
    }
}
