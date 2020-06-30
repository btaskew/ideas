<?php

namespace Tests\Feature;

use App\Idea;
use App\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateIdeaStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_user_can_update_the_status_of_an_idea_and_record_a_comment_for_the_update()
    {
        $oldStatus = create(Status::class);
        $newStatus = create(Status::class);
        $idea = create(Idea::class, ['status_id' => $oldStatus->id]);

        $this->loginAdmin()
            ->patch("ideas/$idea->id/status", [
                'status' => $newStatus->id,
                'comment' => 'This is a status update',
            ]);

        $this->assertEquals($newStatus->id, $idea->fresh()->status_id);
        $this->assertDatabaseHas('status_updates', [
            'comment' => 'This is a status update',
            'idea_id' => $idea->id,
            'status_id' => $newStatus->id,
        ]);
    }

    /** @test */
    public function a_non_admin_user_cannot_update_the_status_of_an_idea()
    {
        $this->withExceptionHandling();

        $oldStatus = create(Status::class);
        $newStatus = create(Status::class);
        $idea = create(Idea::class, ['status_id' => $oldStatus->id]);

        $this->login()
            ->patch("ideas/$idea->id/status", ['status' => $newStatus->id, 'comment' => 'Test'])
            ->assertStatus(403);

        $this->assertEquals($oldStatus->id, $idea->fresh()->status_id);
    }

    /** @test */
    public function a_valid_status_id_is_required()
    {
        $this->withExceptionHandling();

        $idea = create(Idea::class);

        $this->loginAdmin()
            ->patch("ideas/$idea->id/status", ['status' => 6, 'comment' => 'Test'])
            ->assertSessionHasErrors('status');
    }

    /** @test */
    public function a_comment_is_required_when_updating_the_status()
    {
        $this->withExceptionHandling();

        $idea = create(Idea::class);

        $this->loginAdmin()
            ->patch("ideas/$idea->id/status", ['status' => 1])
            ->assertSessionHasErrors('comment');
    }
}
