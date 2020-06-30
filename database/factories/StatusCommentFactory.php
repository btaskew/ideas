<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use App\Status;
use App\StatusUpdate;
use App\User;
use Faker\Generator as Faker;

$factory->define(StatusUpdate::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentence,
        'idea_id' => factory(Idea::class),
        'status_id' => factory(Status::class),
        'user_id' => factory(User::class),
    ];
});
