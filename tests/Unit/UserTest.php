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

    /** @test */
    public function if_the_user_is_logged_in_their_display_will_be_equal_to_you()
    {
        $this->actingAs($user = create(User::class, ['name' => 'John Doe']));

        $this->assertEquals('you', $user->displayName);
    }

    /** @test */
    public function if_the_user_is_not_logged_in_their_display_will_be_equal_to_their_name()
    {
        $user = create(User::class, ['name' => 'John Doe']);

        $this->assertEquals('John Doe', $user->displayName);
    }
}
