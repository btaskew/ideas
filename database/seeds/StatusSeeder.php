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
        factory(Status::class)->create(['name' => Statuses::NEW]);
        factory(Status::class)->create(['name' => Statuses::IN_REVIEW]);
        factory(Status::class)->create(['name' => Statuses::IN_DEVELOPMENT]);
        factory(Status::class)->create(['name' => Statuses::RELEASED]);
        factory(Status::class)->create(['name' => Statuses::REJECTED]);
    }
}
