<?php

use Database\Seeds\SeederSettings;

class TagsTableSeeder extends SeederSettings
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::find(1);

        $postsCount = $this->postsCount;
        $tagsCount = $this->tagsCount;
        $tagsPerPost = $this->tagsPerPost;

        // Create array of tag factory objects
        $tags = [];
        for ($i = 0; $i < $tagsCount; $i++) {
            $tags[] = factory(App\Tag::class)->make();
        }

        // Find post and attach 5 different tags for every post
        for ($p = 1; $p <= $postsCount; $p++) {
            $post = App\Post::find($p);
            $tags_temp = $tags;
            $used_keys = [];

            for ($t = 0; $t < $tagsPerPost; $t++) {
                // Make sure to attach only unique tags for post
                do {
                    $tagKey = rand(0, $tagsCount - 1 - $t);
                } while (in_array($tagKey, $used_keys));

                $tag = $tags_temp[$tagKey];
                $tag->user()->associate($user);
                $tag->save();

                $tag->posts()->attach($post);

                unset($tags_temp[$tagKey]);
                $used_keys[] = $tagKey;
            }
        }
    }
}
