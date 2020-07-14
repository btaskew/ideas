<?php

namespace Tests\Unit;

use App\Comment;
use App\Idea;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_comment_has_a_creator()
    {
        $user = create(User::class);
        $comment = create(Comment::class, ['user_id' => $user->id]);

        $this->assertTrue($comment->creator->is($user));
    }

    /** @test */
    public function a_comment_belongs_to_an_idea()
    {
        $idea = create(Idea::class);
        $comment = create(Comment::class, ['idea_id' => $idea->id]);

        $this->assertTrue($comment->idea->is($idea));
    }
}
