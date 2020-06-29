<?php

namespace App\Http\Controllers;

use App\Attributes\Statuses;
use App\Idea;
use App\Status;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    public function index()
    {
        return view('ideas.index');
    }

    public function show(Idea $idea)
    {
        $comments = $idea->comments()->paginate(10);

        return view('ideas.show', compact('idea', 'comments'));
    }

    public function create()
    {
        return view('ideas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $idea = Idea::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(),
            'status_id' => Status::where('name', Statuses::NEW)->firstOrFail(['id'])->id,
        ]);

        return redirect('/ideas/' . $idea->id);
    }
}
