<?php

namespace Tests\Unit;

use App\Status;
use App\StatusUpdate;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_status_update_has_a_creator()
    {
        $user = create(User::class);
        $update = create(StatusUpdate::class, ['user_id' => $user->id]);

        $this->assertTrue($update->creator->is($user));
    }

    /** @test */
    public function a_status_update_has_a_status()
    {
        $status = create(Status::class);
        $update = create(StatusUpdate::class, ['status_id' => $status->id]);

        $this->assertTrue($update->status->is($status));
    }
}
