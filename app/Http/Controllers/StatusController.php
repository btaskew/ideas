<?php

namespace App\Http\Controllers;

use App\Idea;
use App\Status;

class StatusController extends Controller
{
    public function update(Idea $idea, Status $status)
    {
        $idea->status()->associate($status)->save();
    }
}
