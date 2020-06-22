<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginVoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'idea' => 'required|integer',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect('/login')->withErrors(['password' => 'Invalid credentials']);
        }

        $idea = Idea::findOrFail($request->input('idea'));

        if (!$idea->votes->contains('user_id', auth()->id())) {
            $idea->votes()->create(['user_id' => auth()->id()]);
        }

        return redirect()->back();
    }
}
