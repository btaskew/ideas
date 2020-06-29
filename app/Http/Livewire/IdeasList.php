<?php

namespace App\Http\Livewire;

use App\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasList extends Component
{
    use WithPagination;

    public string $orderBy = 'created_at';

    public function showPopular()
    {
        $this->orderBy = 'votes_count';
    }

    public function showNewest()
    {
        $this->orderBy = 'created_at';
    }

    public function paginationView()
    {
        return 'pagination::tailwind';
    }

    public function render()
    {
        return view('livewire.ideas-list', [
            'ideas' => $this->getIdeas(),
        ]);
    }

    /**
     * @return mixed
     */
    private function getIdeas()
    {
        return Idea::withCount('votes')
            ->with(['status', 'creator', 'votes', 'comments'])
            ->orderBy($this->orderBy, 'desc')
            ->paginate(10);
    }
}
