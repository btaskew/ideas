<?php

namespace Tests\Feature;

use App\Comment;
use App\Idea;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_view_all_the_submitted_ideas()
    {
        $idea = create(Idea::class);

        $this->get('/ideas')
            ->assertSee($idea->title)
            ->assertSee($idea->description);
    }

    /** @test */
    public function the_ideas_should_be_paginated_to_only_display_ten_results()
    {
        $ideas = create(Idea::class, [], 11);

        $this->get('/ideas')
            ->assertSee($ideas->first()->title)
            ->assertDontSee($ideas->last()->title);
    }

    /** @test */
    public function anyone_can_view_a_specific_idea()
    {
        $idea = create(Idea::class);

        $this->get('/ideas/' . $idea->id)
            ->assertSee($idea->title)
            ->assertSee($idea->description);
    }

    /** @test */
    public function the_idea_page_includes_an_ideas_comments()
    {
        $idea = create(Idea::class);
        $commenter = create(User::class);
        $comment = create(Comment::class, ['idea_id' => $idea->id, 'user_id' => $commenter->id]);

        $this->get('/ideas/' . $idea->id)
            ->assertSee($comment->body)
            ->assertSee($commenter->name);
    }

    /** @test */
    public function the_comments_are_paginated()
    {
        $idea = create(Idea::class);
        $comment = create(Comment::class, ['idea_id' => $idea->id], 11);

        $this->get('/ideas/' . $idea->id)
            ->assertSee($comment->first()->body)
            ->assertDontSee($comment->last()->body);
    }
}
