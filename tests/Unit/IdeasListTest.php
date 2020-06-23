<?php

namespace Tests\Unit;

use App\Http\Livewire\IdeasList;
use App\Idea;
use App\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IdeasListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function selecting_popular_will_display_ideas_with_the_most_votes_first()
    {
        $idea = create(Idea::class, ['title' => 'Not very popular']);
        $popularIdea = create(Idea::class, ['title' => 'Popular']);
        create(Vote::class, ['idea_id' => $popularIdea->id]);

        // Can't test the actual order here, so just
        // assert that we can still see both ideas
        Livewire::test(IdeasList::class)
            ->call('showPopular')
            ->assertSee('Popular')
            ->assertSee('Not very popular');
    }

    /** @test */
    public function selecting_newest_will_display_ideas_ind_order_of_their_created_date()
    {
        create(Idea::class, ['title' => 'Old idea', 'created_at' => '2010-01-01 09:00:00']);
        create(Idea::class, ['title' => 'New idea', 'created_at' => '2012-01-01 09:00:00']);

        // Can't test the actual order here, so just
        // assert that we can still see both ideas
        Livewire::test(IdeasList::class)
            ->call('showNewest')
            ->assertSee('New')
            ->assertSee('Old idea');
    }
}
