<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Thread $thread, Request $request)
    {
        $thread->addReply(new Reply([
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]));

        return back();
    }
}
