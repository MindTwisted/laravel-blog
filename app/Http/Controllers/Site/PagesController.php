<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PagesController extends Controller
{
    /**
     * Show public site index page
     *
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function indexPage(PostRepository $postRepository)
    {
        $posts = $postRepository->latest(9)->get();

        return view('site.pages.indexPage.indexPage', compact('posts'));
    }

    /**
     * Show public site blog page
     *
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function blogPage(PostRepository $postRepository)
    {
        $filters = Request::only(['text', 'category', 'tag']);
        $posts = $postRepository->all($filters)->paginate(5);

        return view('site.pages.blogPage.blogPage', compact('posts', 'filters'));
    }

    /**
     * Show public site post page
     *
     * @param int $id
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function postPage(
        int $id,
        PostRepository $postRepository
    )
    {
        $post = $postRepository->find($id);
        $prevNextID = $postRepository->prevNextID($post);

        return view('site.pages.postPage.postPage', compact('post', 'prevNextID'));
    }
}
