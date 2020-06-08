<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->with(['creator', 'votes'])->paginate(10);

        return view('ideas.index', compact('ideas'));
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
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
        ]);

        return redirect('/ideas/' . $idea->id);
    }
}
