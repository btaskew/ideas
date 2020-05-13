<?php

namespace Tests\Feature;

use App\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_view_all_the_submitted_ideas()
    {
        $idea = create(Idea::class);

        $this->get('/ideas')
            ->assertSee($idea->title)
            ->assertSee($idea->description);
    }

    /** @test */
    public function the_ideas_should_be_paginated_to_only_display_ten_results()
    {
        $ideas = create(Idea::class, [], 11);

        $this->get('/ideas')
            ->assertSee($ideas->first()->title)
            ->assertDontSee($ideas->last()->title);
    }
}
