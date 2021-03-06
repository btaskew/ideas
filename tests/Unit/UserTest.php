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

    /** @test */
    public function if_the_user_is_an_admin_this_will_be_indicated_in_their_display_name()
    {
        $user = create(User::class, ['name' => 'John Doe', 'is_admin' => true]);

        $this->assertEquals('John Doe (admin)', $user->displayName);
    }

    /** @test */
    public function a_user_can_determine_if_it_is_an_admin()
    {
        $adminUser = create(User::class, ['is_admin' => true]);
        $this->assertTrue($adminUser->isAdmin());

        $normalUser = create(User::class, ['is_admin' => false]);
        $this->assertFalse($normalUser->isAdmin());
    }
}
