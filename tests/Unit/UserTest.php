<?php

namespace Tests\Unit;

use App\Idea;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_owns_many_ideas()
    {
        $user = create(User::class);
        $idea = create(Idea::class, ['user_id' => $user->id]);

        $this->assertTrue($user->ideas->contains($idea));
    }
}
