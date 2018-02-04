<?php

$factory->define(App\User::class, function () {
    return [
        'name' => env('SEED_USER_NAME', 'TestUser'),
        'email' => env('SEED_USER_EMAIL', 'test@example.com'),
        'password' => bcrypt(env('SEED_USER_PASSWORD', 'secret')),
        'remember_token' => str_random(10),
    ];
});
