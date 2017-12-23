<?php

use Database\Seeds\SeederSettings;

class CategoriesTableSeeder extends SeederSettings
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

        for ($c = 0; $c < $categoriesCount; $c++) {
            $category = factory(App\Category::class)->make();
            $category->user()->associate($user);
            $category->save();
        }
    }
}
