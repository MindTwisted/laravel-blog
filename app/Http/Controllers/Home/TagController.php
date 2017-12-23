<?php

namespace App\Http\Controllers\Home;

use App\Tag;
use App\Http\Requests\EditTagRequest;
use App\Repositories\TagRepository;
use App\Http\Requests\StoreTagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\Response
     */
    public function index(TagRepository $tagRepository)
    {
        $tags = $tagRepository->all();

        return view('home.pages.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTagRequest $request
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request,
                          TagRepository $tagRepository)
    {
        $tagRepository->create($request);

        return redirect()->route('tags.index')
            ->with('status',
                "Tag '{$request->input('title')}'
                was successfully added");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('home.pages.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditTagRequest $request
     * @param TagRepository $tagRepository
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(EditTagRequest $request,
                           TagRepository $tagRepository,
                           Tag $tag)
    {
        $isChanged = $tagRepository->update($request, $tag);

        return $isChanged ?
            redirect()->route('tags.index')
                ->with('status',
                    "Tag '{$request->input('title')}'
                was successfully updated") :
            redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @param TagRepository $tagRepository
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag,
                            TagRepository $tagRepository)
    {
        $tagRepository->delete($tag);

        return redirect()->route('tags.index')
            ->with('status',
                "Tag '{$tag->title}'
                was successfully deleted");
    }
}
