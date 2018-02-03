<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $date = $faker->dateTimeThisYear;

    return [
        'title' => $faker->words($nb = 3, $asText = true),
        'body' => $faker->text($maxNbChars = 5000),
        'body_preview' => $faker->text($maxNbChars = 2000),
        'created_at' => $date,
        'updated_at' => $date
    ];
});
