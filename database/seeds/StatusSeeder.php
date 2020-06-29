<?php

use App\Attributes\Statuses;
use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class)->create([
            'status' => Statuses::NEW_STATUS,
            'name' => Statuses::NEW,
        ]);
        factory(Status::class)->create([
            'status' => Statuses::IN_REVIEW_STATUS,
            'name' => Statuses::IN_REVIEW,
        ]);
        factory(Status::class)->create([
            'status' => Statuses::IN_DEVELOPMENT_STATUS,
            'name' => Statuses::IN_DEVELOPMENT,
        ]);
        factory(Status::class)->create([
            'status' => Statuses::RELEASED_STATUS,
            'name' => Statuses::RELEASED,
        ]);
        factory(Status::class)->create([
            'status' => Statuses::REJECTED_STATUS,
            'name' => Statuses::REJECTED,
        ]);
    }
}
