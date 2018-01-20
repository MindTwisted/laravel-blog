<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class TagRepository
{
    /**
     * Get all tags from DB
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function all()
    {
        return Tag::withCount('posts');
    }

    /**
     * Create new tag
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $tag = new Tag($request->only(['title']));
        $user = Auth::user();

        $tag->user()->associate($user);

        $tag->save();
    }

    /**
     * Delete provided tag
     *
     * @param Tag $tag
     * @throws \Exception
     */
    public function delete(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
    }

    /**
     * Edit provided tag
     *
     * @param Request $request
     * @param Tag $tag
     * @return bool
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->title = $request->input('title');
        $isDirty = $tag->isDirty();
        $tag->save();

        return $isDirty;
    }
}