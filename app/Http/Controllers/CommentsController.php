<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Idea $idea)
    {
        $request->validate([
            'body' => 'required|string|max:400',
        ]);

        $idea->comments()->create([
            'body' => htmlspecialchars($request->input('body')),
            'user_id' => auth()->id(),
        ]);

        return redirect('/ideas/' . $idea->id);
    }
}
