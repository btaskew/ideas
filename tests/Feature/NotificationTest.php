<?php

namespace Tests\Feature;

use App\Idea;
use App\Notifications\VoteRecorded;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_ideas_owner_is_notified_when_someone_votes_on_their_idea()
    {
        Notification::fake();
        $owner = create(User::class);
        $voter = create(User::class);
        $idea = create(Idea::class, ['user_id' => $owner->id]);

        $idea->votes()->create(['user_id' => $voter->id]);

        Notification::assertSentTo($owner, VoteRecorded::class);
    }
}
