<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginVoteController extends Controller
{
    use AuthenticatesUsers;

    public function store(Request $request)
    {
        $this->validateLogin($request);

        if (!$this->attemptLogin($request)) {
            return $this->sendFailedLoginResponse($request);
        }

        $idea = Idea::findOrFail($request->input('idea'));

        if (!$idea->votes->contains('user_id', auth()->id())) {
            $idea->votes()->create(['user_id' => auth()->id()]);
        }

        return redirect('/ideas');
    }
}
