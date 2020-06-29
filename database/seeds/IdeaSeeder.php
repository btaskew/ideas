<?php

use App\Idea;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            factory(Idea::class)->create(['status_id' => rand(1, 5)]);
        }
    }
}
