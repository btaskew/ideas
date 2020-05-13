<?php

/** @var Factory $factory */

use App\Idea;
use App\User;
use App\Vote;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'idea_id' => factory(Idea::class),
        'user_id' => factory(User::class),
    ];
});
