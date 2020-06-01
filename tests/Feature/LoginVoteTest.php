<?php

namespace Tests\Feature;

use App\Idea;
use App\User;
use App\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginVoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function _a_user_can_login_and_record_a_vote_for_an_idea()
    {
        $idea = create(Idea::class);
        $user = create(User::class);

        $this->post('/login-vote', [
            'email' => $user->email,
            'password' => 'password',
            'idea' => $idea->id
        ])
            ->assertRedirect('/ideas');

        $this->assertDatabaseHas('votes', [
            'user_id' => $user->id,
            'idea_id' => $idea->id,
        ]);
    }

    /** @test */
    public function a_new_vote_is_not_recorded_if_the_user_has_already_voted_for_the_idea()
    {
        $idea = create(Idea::class);
        $user = create(User::class);
        create(Vote::class, ['idea_id' => $idea, 'user_id' => $user]);

        $this->post('/login-vote', [
            'email' => $user->email,
            'password' => 'password',
            'idea' => $idea->id
        ]);

        $this->assertCount(1, Vote::all());
    }

    /** @test */
    public function the_user_is_redirected_to_the_login_page_if_their_credentials_are_invalid()
    {
        $idea = create(Idea::class);
        $user = create(User::class);

        $this->post('/login-vote', [
            'email' => $user->email,
            'password' => 'wrongpassword',
            'idea' => $idea->id
        ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('password');
    }
}
