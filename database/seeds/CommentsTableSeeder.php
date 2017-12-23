<?php

use Database\Seeds\SeederSettings;

class CommentsTableSeeder extends SeederSettings
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postsCount = $this->postsCount;
        $commentsPerPost = $this->commentsPerPost;

        for ($p = 1; $p <= $postsCount; $p++) {
            $post = App\Post::find($p);

            for ($c = 0; $c < $commentsPerPost; $c++) {
                $comment = factory(App\Comment::class)->make();
                $comment->post()->associate($post);
                $comment->approved = true;
                $comment->save();
            }
        }

        // Generate 5 unapproved comments for development purposes
        $post = App\Post::find(1);

        for ($c = 0; $c < 5; $c++) {
            $comment = factory(App\Comment::class)->make();
            $comment->post()->associate($post);
            $comment->save();
        }
    }
}
