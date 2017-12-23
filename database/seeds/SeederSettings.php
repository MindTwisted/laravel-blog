<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;

class SeederSettings extends Seeder
{
    // Class which help you to setup seeders
    public $categoriesCount = 10;
    public $postsPerCategory = 5;
    public $postsCount;
    public $tagsCount = 20;
    public $tagsPerPost = 5;
    public $commentsPerPost = 5;

    public function __construct()
    {
        $this->postsCount = $this->categoriesCount * $this->postsPerCategory;
    }
}
