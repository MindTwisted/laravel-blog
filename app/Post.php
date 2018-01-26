<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * Posts belongs to single user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Posts belongs to single category
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Post belongs to many tags
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Post has many comments
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Post with approved comments
     */
    public function approvedComments()
    {
        return $this->hasMany('App\Comment')->approved();
    }
}
