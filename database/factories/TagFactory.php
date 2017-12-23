<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 2, $asText = true)
    ];
});
