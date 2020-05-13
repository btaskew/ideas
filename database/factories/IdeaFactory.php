<?php

/** @var Factory $factory */

use App\Idea;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
