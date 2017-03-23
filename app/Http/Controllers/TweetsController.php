<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        return request()->user()->tweets()->with(['user'])->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $tweet = $request->user()->tweets()->create([
            'body' => $request->body
        ])->load('user');

        return $tweet;
    }
}
