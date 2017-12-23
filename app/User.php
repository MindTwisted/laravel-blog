<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User owns many categories
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * User owns many posts
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * User owns many tags
     */
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

}
