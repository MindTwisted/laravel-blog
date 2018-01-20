<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->all()->get();

        return view('home.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCategoryRequest $request
     * @param CategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request,
                          CategoryRepository $categoryRepository)
    {
        $categoryRepository->create($request);

        return redirect()->route('categories.index')
            ->with('status',
                "Category '{$request->input('title')}'
                was successfully added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('home.pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditCategoryRequest $request
     * @param CategoryRepository $categoryRepository
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request,
                           CategoryRepository $categoryRepository,
                           Category $category)
    {
        $isChanged = $categoryRepository->update($request, $category);

        return $isChanged ?
            redirect()->route('categories.index')
                ->with('status',
                    "Category '{$request->input('title')}'
                was successfully updated") :
            redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @param CategoryRepository $categoryRepository
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,
                            CategoryRepository $categoryRepository)
    {
        $categoryRepository->delete($category);

        return redirect()->route('categories.index')
            ->with('status',
                "Category '{$category->title}'
                was successfully deleted");
    }
}
