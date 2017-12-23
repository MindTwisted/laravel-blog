<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * Tags belongs to single user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Tag belongs to many posts
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
