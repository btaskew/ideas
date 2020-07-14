<?php

namespace Tests\Unit;

use App\Idea;
use App\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_vote_belongs_to_an_idea()
    {
        $idea = create(Idea::class);
        $vote = create(Vote::class, ['idea_id' => $idea->id]);

        $this->assertTrue($vote->idea->is($idea));
    }
}
