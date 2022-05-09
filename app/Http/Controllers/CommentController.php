<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Video;

class CommentController extends Controller
{

    public function store(CommentRequest $request, Video $video)
    {
        $video->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body
        ]);

        return back()->with('alert', __('messages.comment_added'));
    }
}
