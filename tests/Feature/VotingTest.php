<?php

namespace Tests\Feature;

use App\Http\Livewire\VoteButton;
use App\Idea;
use App\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class VotingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_vote_button_is_displayed_correctly_if_the_user_has_voted_for_an_idea()
    {
        $this->login();

        $idea = create(Idea::class);
        create(Vote::class, ['idea_id' => $idea->id, 'user_id' => auth()->id()]);

        Livewire::test(VoteButton::class, ['idea' => $idea])
            ->assertSee('Voted!');
    }

    /** @test */
    public function a_user_can_vote_for_an_idea()
    {
        $idea = create(Idea::class);

        $this->login();

        Livewire::test(VoteButton::class, ['idea' => $idea])
            ->call('vote')
            ->assertSee('Voted!');

        $this->assertDatabaseHas('votes', [
            'user_id' => auth()->id(),
            'idea_id' => $idea->id,
        ]);
    }

    /** @test */
    public function a_user_cannot_vote_for_an_idea_twice()
    {
        $this->login();

        $idea = create(Idea::class);
        create(Vote::class, ['idea_id' => $idea->id, 'user_id' => auth()->id()]);

        Livewire::test(VoteButton::class, ['idea' => $idea])
            ->call('vote');

        $this->assertCount(1, $idea->votes);
    }

    /** @test */
    public function a_login_form_is_displayed_if_a_guest_attempts_to_vote()
    {
        $idea = create(Idea::class);

        Livewire::test(VoteButton::class, ['idea' => $idea])
            ->call('vote')
            ->assertSee('Login or register to vote');

        $this->assertCount(0, $idea->votes);
    }

    /** @test */
    public function the_login_form_is_closed_when_the_correct_event_is_fired()
    {
        $idea = create(Idea::class);

        Livewire::test(VoteButton::class, ['idea' => $idea])
            ->call('vote')
            ->assertSee('Login or register to vote')
            ->emit('closeLogin')
            ->assertDontSee('Login or register to vote');
    }
}
