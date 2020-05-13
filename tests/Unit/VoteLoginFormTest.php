<?php

namespace Tests\Unit;

use App\Http\Livewire\VoteLoginForm;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class VoteLoginFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_display_the_password_input_if_the_email_entered_belongs_to_a_user()
    {
        $user = create(User::class);

        Livewire::test(VoteLoginForm::class)
            ->set('email', $user->email)
            ->call('verifyEmail')
            ->assertSee('Password')
            ->assertSee('Login and vote')
            ->assertDontSee('Next');
    }

    /** @test */
    public function it_should_display_a_registration_message_if_the_email_entered_does_not_belong_to_a_user()
    {
        Livewire::test(VoteLoginForm::class)
            ->set('email', 'foo@email.com')
            ->call('verifyEmail')
            ->assertSee('register')
            ->assertDontSee('Login and vote')
            ->assertDontSee('Next');
    }

    /** @test */
    public function it_should_login_a_valid_user_and_emit_an_event_to_record_their_vote()
    {
        $user = create(User::class);

        Livewire::test(VoteLoginForm::class)
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('loginAndVote')
            ->assertEmitted('voteRecorded');

        $this->assertTrue(auth()->check());
    }

    /** @test */
    public function it_should_display_an_error_message_if_the_credentials_were_incorrect()
    {
        $user = create(User::class);

        Livewire::test(VoteLoginForm::class)
            ->set('email', $user->email)
            ->call('verifyEmail')
            ->set('password', 'wrongpassword')
            ->call('loginAndVote')
            ->assertSee('These credentials do not match our records');

        $this->assertFalse(auth()->check());
    }
}
