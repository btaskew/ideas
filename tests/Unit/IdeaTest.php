<?php

namespace Tests\Unit;

use App\Idea;
use App\User;
use App\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_idea_belongs_to_a_user()
    {
        $user = create(User::class);
        $idea = create(Idea::class, ['user_id' => $user->id]);

        $this->assertTrue($idea->creator->is($user));
    }

    /** @test */
    public function an_idea_has_many_votes()
    {
        $idea = create(Idea::class);
        $vote = create(Vote::class, ['idea_id' => $idea->id]);

        $this->assertTrue($idea->votes->contains($vote));
    }
}
