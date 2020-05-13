<?php

namespace App\Http\Livewire;

use App\Idea;
use Livewire\Component;

class VoteButton extends Component
{
    /**
     * @var Idea
     */
    public $idea;

    /**
     * @var int
     */
    public int $voteCount = 0;

    /**
     * @var bool
     */
    public bool $userHasVoted = false;

    /**
     * @var bool
     */
    public bool $showLoginForm = false;

    /**
     * @var string[]
     */
    protected $listeners = ['closeLogin'];

    /**
     * @param Idea $idea
     */
    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->voteCount = $idea->votes->count();
        $this->userHasVoted = $idea->votes->contains('user_id', auth()->id());
    }

    public function vote(): void
    {
        if (!auth()->check()) {
            $this->showLoginForm = true;
            return;
        }

        if ($this->userHasVoted) {
            return;
        }

        $this->idea->votes()->create(['user_id' => auth()->id()]);
        $this->voteCount++;
        $this->userHasVoted = true;
    }

    public function closeLogin(): void
    {
        $this->showLoginForm = false;
    }

    public function render()
    {
        return view('livewire.vote-button');
    }
}
