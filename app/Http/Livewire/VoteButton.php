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
        if ($this->userHasVoted) {
            return;
        }

        $this->idea->votes()->create(['user_id' => auth()->id()]);
        $this->voteCount++;
        $this->userHasVoted = true;
    }

    public function render()
    {
        return view('livewire.vote-button');
    }
}
