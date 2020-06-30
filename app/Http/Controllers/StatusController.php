<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Status;
use App\StatusComment;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Idea $idea, Request $request)
    {
        $request->validate([
            'status' => 'required|integer|max:5',
            'comment' => 'required|string',
        ]);

        $idea->updateStatus($request->input('status'), $request->input('comment'));

        return redirect()->back();
    }
}
