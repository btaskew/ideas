<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use App\Status;
use App\StatusComment;
use App\User;
use Faker\Generator as Faker;

$factory->define(StatusComment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'idea_id' => factory(Idea::class),
        'status_id' => factory(Status::class),
        'user_id' => factory(User::class),
    ];
});
