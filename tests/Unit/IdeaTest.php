<?php

namespace Tests\Unit;

use App\Comment;
use App\Idea;
use App\Status;
use App\StatusUpdate;
use App\User;
use App\Vote;
use Illuminate\Database\Eloquent\Collection;
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

    /** @test */
    public function an_idea_has_many_comments()
    {
        $idea = create(Idea::class);
        $comment = create(Comment::class, ['idea_id' => $idea->id]);

        $this->assertTrue($idea->comments->contains($comment));
    }

    /** @test */
    public function an_idea_belongs_to_a_status()
    {
        $status = create(Status::class);
        $idea = create(Idea::class, ['status_id' => $status->id]);

        $this->assertTrue($idea->status->is($status));
    }

    /** @test */
    public function an_idea_has_many_status_updates()
    {
        $idea = create(Idea::class);
        $update = create(StatusUpdate::class, ['idea_id' => $idea->id]);

        $this->assertTrue($idea->statusUpdates->contains($update));
    }

    /** @test */
    public function an_idea_can_fetch_all_its_comments_with_status_updates_in_reverse_order_of_creation()
    {
        $idea = create(Idea::class);
        $comment = create(Comment::class, ['idea_id' => $idea->id, 'created_at' => '2020-01-01 09:00']);
        $update = create(StatusUpdate::class, ['idea_id' => $idea->id, 'created_at' => '2020-01-01 10:00']);

        $allComments = $idea->getAllComments();
        $this->assertInstanceOf(Collection::class, $allComments);
        $this->assertTrue($allComments->contains($update));
        $this->assertTrue($allComments->contains($comment));
        $this->assertTrue($allComments->first()->is($update));
    }
}
