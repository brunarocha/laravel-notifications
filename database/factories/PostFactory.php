<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id'   => 1,
        'title'     => $faker->unique()->word,
        'body'      => $faker->sentence(),
    ];
});
