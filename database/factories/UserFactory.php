<?php

$factory->define(App\User::class, function () {
    return [
        'name' => 'MindTwisted',
        'email' => 'nikolaynikm@gmail.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
