<?php

namespace Tests\Feature;

use App\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_the_comments_form_on_an_ideas_page()
    {
        $idea = create(Idea::class);

        $this->login()
            ->get("/ideas/$idea->id")
            ->assertSee('Any comments?');
    }

    /** @test */
    public function a_guest_cant_see_the_comments_form()
    {
        $idea = create(Idea::class);

        $this->get("/ideas/$idea->id")
            ->assertDontSee('Any comments?')
            ->assertDontSee('Login to comment');
    }

    /** @test */
    public function a_user_can_comment_on_an_idea()
    {
        $idea = create(Idea::class);

        $this->login()
            ->post("/ideas/$idea->id/comments", ['body' => 'My new comment']);

        $this->assertDatabaseHas('comments', [
            'idea_id' => $idea->id,
            'body' => 'My new comment',
        ]);
    }

    /** @test */
    public function a_body_is_required_when_making_a_comment()
    {
        $this->withExceptionHandling();

        $idea = create(Idea::class);

        $this->login()
            ->post("/ideas/$idea->id/comments", [])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function the_comment_is_limited_to_400_characters()
    {
        $this->withExceptionHandling();

        $idea = create(Idea::class);

        $this->login()
            ->post("/ideas/$idea->id/comments", ['body' => str_repeat('x', 401)])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_comment_is_sanitised_before_saving()
    {
        $idea = create(Idea::class);

        $this->login()
            ->post("/ideas/$idea->id/comments", ['body' => "<script>My bad comment</script>"]);

        $this->assertDatabaseHas('comments', [
            'idea_id' => $idea->id,
            'body' => htmlspecialchars("<script>My bad comment</script>"),
        ]);
    }
}
