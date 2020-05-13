<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VoteLoginForm extends Component
{
    /**
     * @var string
     */
    public ?string $email;

    /**
     * @var string
     */
    public ?string $password;

    /**
     * @var bool
     */
    public bool $emailSubmitted = false;

    /**
     * @var bool
     */
    public bool $userExists = false;

    /**
     * @var bool
     */
    public bool $invalidLogin = false;

    public function verifyEmail(): void
    {
        $this->emailSubmitted = true;
        $this->userExists = User::where('email', $this->email)->exists();
    }

    public function loginAndVote(): void
    {
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->invalidLogin = true;
            return;
        }

        $this->invalidLogin = false;
        $this->emitUp('voteRecorded');
    }

    public function render()
    {
        return view('livewire.vote-login-form');
    }
}
