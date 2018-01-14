<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display public site index page
     *
     * @param PostRepository $postRepository
     * @return \Illuminate\Http\Response
     */
    public function indexPage(PostRepository $postRepository)
    {
        $posts = $postRepository->latest(9);

        return view('site.pages.index', compact('posts'));
    }
}
