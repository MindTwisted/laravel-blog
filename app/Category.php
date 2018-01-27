<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * Categories belongs to single user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Category owns many posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get category posts except post with $id
     */
    public function postsExcept($id)
    {
        return $this->hasMany('App\Post')->except($id);
    }
}
