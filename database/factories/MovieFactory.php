<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    $genres = [
        'Western',
        'Action',
        'Drama',
        'Thriller',
        'Comedy',
        'Horror',
        'Cartoon',
        'Romance',
        'Documentary',
        'War'
    ];

    return [
        'name' => $faker->sentence,
        'director' => $faker->name,
        'image_url' => $faker->imageUrl,
        'duration' => $faker->numberBetween($min = 60, $max = 400),
        'release_date' => $faker->date,
        'genres' => $faker->randomElements($genres, $count = 3)
    ];
});
