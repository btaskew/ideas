<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class VoteLoginForm extends Component
{
    /**
     * @var int
     */
    public int $ideaId;

    /**
     * @var string
     */
    public ?string $email;

    /**
     * @var bool
     */
    public bool $emailSubmitted = false;

    /**
     * @var bool
     */
    public bool $userExists = false;

    /**
     * @param int $ideaId
     */
    public function mount(int $ideaId)
    {
        $this->ideaId = $ideaId;
    }

    public function verifyEmail(): void
    {
        $this->emailSubmitted = true;
        $this->userExists = User::where('email', $this->email)->exists();
    }

    public function render()
    {
        return view('livewire.vote-login-form');
    }
}
