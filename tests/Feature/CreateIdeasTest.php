<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_create_ideas_page()
    {
        $this->login()
            ->get('/ideas/create')
            ->assertSee('Create');
    }

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

    /** @test */
    public function a_title_is_required_for_an_idea()
    {
        $this->withExceptionHandling();

        $this->login()
            ->post('/ideas', [
                'description' => 'My new idea',
            ])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_description_is_required_for_an_idea()
    {
        $this->withExceptionHandling();

        $this->login()
            ->post('/ideas', [
                'title' => 'New idea',
            ])
            ->assertSessionHasErrors('description');
    }
}
