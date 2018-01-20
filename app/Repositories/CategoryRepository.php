<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryRepository
{
    /**
     * Get all categories from DB
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function all()
    {
        return Category::withCount('posts');
    }

    /**
     * Find category by $id
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Delete provided category
     *
     * @param Category $category
     * @throws \Exception
     */
    public function delete(Category $category)
    {
        $category->delete();
    }

    /**
     * Create new category
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $category = new Category($request->only(['title']));
        $user = Auth::user();

        $category->user()->associate($user);

        $category->save();
    }

    /**
     * Edit provided category
     *
     * @param Request $request
     * @param Category $category
     * @return bool
     */
    public function update(Request $request,
                           Category $category)
    {
        $category->title = $request->input('title');
        $isDirty = $category->isDirty();
        $category->save();

        return $isDirty;
    }
}