<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.pages.index');
    }

    /**
     * Get posts count by category
     *
     * @param CategoryRepository $categoryRepository
     * @return array;
     */
    public function postCategoryStats(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->all()->get();
        $categoriesNames = [];
        $postsCount = [];

        foreach ($categories as $category) {
            $categoriesNames[] = $category->title;
            $postsCount[] = $category->posts_count;
        }

        return response()
            ->json([
                'categoriesNames' => $categoriesNames,
                'postsCount' => $postsCount
            ]);
    }

    /**
     * Get posts grouped by created at date
     */
    public function postPerDateStats()
    {
        $postsPerDate = Post::orderBy('created_at', 'asc')->get()->groupBy(function ($item) {
            return $item->created_at->format('M-y');
        });
        $dates = [];
        $postsCount = [];

        foreach ($postsPerDate as $key => $val) {
            $dates[] = $key;
            $postsCount[] = count($val);
        }

        return response()
            ->json([
                'dates' => $dates,
                'postsCount' => $postsCount
            ]);
    }
}
