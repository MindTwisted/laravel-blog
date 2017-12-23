<?php

use Database\Seeds\SeederSettings;

class UsersTableSeeder extends SeederSettings
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create();
    }
}
