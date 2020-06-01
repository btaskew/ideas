<?php

namespace App\Http\Livewire;

use App\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
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
    protected $listeners = ['closeLogin', 'voteRecorded' => 'recordAndReload'];

    /**
     * @param Idea $idea
     */
    public function mount(Idea $idea): void
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

        $this->idea->votes()->create(['user_id' => auth()->id()]);
        $this->voteCount++;
        $this->userHasVoted = true;
        $this->showLoginForm = false;
    }

    /**
     * @return RedirectResponse
     */
    public function recordAndReload()
    {
        $this->idea->votes()->create(['user_id' => auth()->id()]);
        return redirect()->to('/ideas');
    }

    public function closeLogin(): void
    {
        $this->showLoginForm = false;
    }

    /**
     * @return View
     */
    public function render()
    {
        return view('livewire.vote-button');
    }
}
