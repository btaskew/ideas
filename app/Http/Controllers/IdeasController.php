<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->with(['creator', 'votes'])->paginate(10);

        return view('ideas', compact('ideas'));
    }

    public function store(Request $request)
    {
        $idea = Idea::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(),
        ]);

        return redirect('/ideas/' . $idea->id);
    }
}
