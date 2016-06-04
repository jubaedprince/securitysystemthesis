<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'url' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});