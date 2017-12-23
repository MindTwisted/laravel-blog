<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'author_name' => $faker->name($gender = null),
        'author_email' => $faker->safeEmail,
        'body' => $faker->text($maxNbChars = 300)
    ];
});
