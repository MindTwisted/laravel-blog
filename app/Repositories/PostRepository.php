<?php

namespace App\Repositories;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;

class PostRepository
{

    /**
     * Get all posts from DB
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Post::withCount('comments')->get();
    }

    /**
     * Get all posts from DB with pagination
     *
     * @param $perPage
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function paginate($perPage = 10)
    {
        return Post::withCount('comments')->paginate($perPage);
    }

    /**
     * Get all posts from DB with simple pagination
     *
     * @param $perPage
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function simplePaginate($perPage = 10)
    {
        return Post::withCount('comments')->simplePaginate($perPage);
    }

    /**
     * Get latest posts from DB
     *
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function latest(int $count = 6)
    {
        return Post::withCount('comments')->latest()->take($count)->get();
    }

    /**
     * Get filtered posts from DB
     *
     * @param array $filter
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function filter(array $filter)
    {
        $text = $filter['text'];
        $category = $filter['category'];
        $order = $filter['order'];

        $posts = Post
            ::when($text, function ($query) use ($text) {
                return $query->where(function ($query) use ($text) {
                    $query->where('title', 'LIKE', "%{$text}%")
                        ->orWhere('body', 'LIKE', "%{$text}%");
                });
            })
            ->when($category && $category !== 'NO_CATEGORY',
                function ($query) use ($category) {
                    return $query->where('category_id', $category);
                })
            ->when($category && $category === 'NO_CATEGORY',
                function ($query) use ($category) {
                    return $query->where('category_id', NULL);
                })
            ->when($order === 'DESC', function ($query) use ($order) {
                return $query->latest();
            })
            ->get();

        return $posts;
    }

    /**
     * Create new post
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $post = new Post($request->only(['title', 'body']));

        if ($category_id = $request->input('category')) {
            $category = Category::findOrFail($category_id);
            $post->category()->associate($category);
        }

        if (!!$request->file('image')) {
            $file = $request->file('image');

            $pathImage = $file->hashName('public/images/blog');
            $pathThumbnail = $file->hashName('public/images/blog/thumbnails');

            $image = Image::make($file)->resize(1280, 1024);
            $thumbnail = Image::make($file)->resize(500, 400);

            Storage::put($pathImage, (string)$image->encode());
            Storage::put($pathThumbnail, (string)$thumbnail->encode());

            $post->image_path = $pathImage;
            $post->thumbnail_path = $pathThumbnail;
        }

        $post->user()->associate($user);
        $post->save();

        if ($tags = $request->input('tags')) {
            $post->tags()->attach($tags);
        }

        return $post;
    }

    /**
     * Edit provided post
     *
     * @param Request $request
     * @param Post $post
     * @return bool;
     */
    public function update(Request $request,
                           Post $post)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($category_id = $request->input('category')) {
            $category = Category::findOrFail($category_id);
            $post->category()->associate($category);
        } else {
            if (isset($post->category->id)) {
                $post->category()->dissociate();
            }
        }

        if ($tags = $request->input('tags')) {
            $synced = $post->tags()->sync($tags);
            $relationChanged = !!$synced['attached'] ||
                !!$synced['detached'] ||
                !!$synced['updated'];
        } else {
            $detached = $post->tags()->detach();
            $relationChanged = !!$detached;
        }

        if (!!$request->file('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }

            if ($post->thumbnail_path) {
                Storage::delete($post->thumbnail_path);
            }

            $file = $request->file('image');

            $pathImage = $file->hashName('public/images/blog');
            $pathThumbnail = $file->hashName('public/images/blog/thumbnails');

            $image = Image::make($file)->resize(1280, 1024);
            $thumbnail = Image::make($file)->resize(500, 400);

            Storage::put($pathImage, (string)$image->encode());
            Storage::put($pathThumbnail, (string)$thumbnail->encode());

            $post->image_path = $pathImage;
            $post->thumbnail_path = $pathThumbnail;
        }

        $isDirty = $post->isDirty() || $relationChanged;
        $post->save();

        return $isDirty;
    }

    /**
     * Delete provided post
     *
     * @param Post $post
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        if ($post->image_path) {
            Storage::delete($post->image_path);
        }

        if ($post->thumbnail_path) {
            Storage::delete($post->thumbnail_path);
        }
    }

    /**
     * Remove image in provided post
     *
     * @param Post $post
     */
    public function deleteImage(Post $post)
    {
        if ($post->image_path) {
            Storage::delete($post->image_path);
            $post->image_path = null;
        }

        if ($post->thumbnail_path) {
            Storage::delete($post->thumbnail_path);
            $post->thumbnail_path = null;
        }

        $post->save();
    }
}