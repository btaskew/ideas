<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function update(Idea $idea, Request $request)
    {
        $request->validate([
            'status' => 'required|integer|max:5'
        ]);

        $idea->status()->associate(Status::findOrFail($request->status))->save();

        return redirect()->back();
    }
}
