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
    public function an_admin_user_can_update_the_status_of_an_idea()
    {
        $oldStatus = create(Status::class);
        $newStatus = create(Status::class);
        $idea = create(Idea::class, ['status_id' => $oldStatus->id]);

        $this->loginAdmin()
            ->patch("ideas/$idea->id/status/$newStatus->id");

        $this->assertEquals($newStatus->id, $idea->fresh()->status_id);
    }

    /** @test */
    public function a_non_admin_user_cannot_update_the_status_of_an_idea()
    {
        $this->withExceptionHandling();

        $oldStatus = create(Status::class);
        $newStatus = create(Status::class);
        $idea = create(Idea::class, ['status_id' => $oldStatus->id]);

        $this->login()
            ->patch("ideas/$idea->id/status/$newStatus->id")
            ->assertStatus(403);

        $this->assertEquals($oldStatus->id, $idea->fresh()->status_id);
    }
}
