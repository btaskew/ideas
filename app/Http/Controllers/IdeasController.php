<?php

namespace App\Http\Controllers;

use App\Idea;

class IdeasController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->with(['creator', 'votes'])->paginate(10);

        return view('ideas', compact('ideas'));
    }
}
