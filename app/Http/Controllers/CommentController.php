<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post) {
        request()->validate([
            'body' => ['required', 'min:3' ]
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Your comment was added');
    }
}
