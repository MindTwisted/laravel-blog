<?php

use Database\Seeds\SeederSettings;

class PostsTableSeeder extends SeederSettings
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::find(1);

        $categoriesCount = $this->categoriesCount;
        $postsPerCategory = $this->postsPerCategory;

        for ($c = 1; $c <= $categoriesCount; $c++) {
            $category = App\Category::find($c);

            for ($p = 0; $p < $postsPerCategory; $p++) {
                $post = factory(App\Post::class)->make();
                $post->user()->associate($user);
                $post->category()->associate($category);
                $post->save();
            }
        }
    }
}
