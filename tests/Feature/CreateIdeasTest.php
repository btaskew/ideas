<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_new_idea()
    {
        $this->login()
            ->post('/ideas', [
                'title' => 'New idea',
                'description' => 'My new idea',
            ])
            ->assertRedirect('/ideas/1');

        $this->assertDatabaseHas('ideas', [
            'title' => 'New idea',
            'description' => 'My new idea',
        ]);
    }
}
