<?php

$factory->define(App\User::class, function () {
    return [
        'name' => 'TestUser',
        'email' => 'test@example.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
