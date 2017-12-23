<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author_name', 'author_email', 'body'];

    /**
     * Comments belongs to single post
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
