<?php

namespace App\Http\Controllers\Site;

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
        $posts = $postRepository->all()->paginate(5);

        return view('site.pages.blogPage.blogPage', compact('posts'));
    }
}
