<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Video;

class VideoController extends Controller
{
    //show page to get video info
    public function create()
    {
        $categories = Category::all();
        return view('videos/create', compact('categories'));
    }

    //receive form request
    public function store(StoreVideoRequest $request)
    {
        Video::create($request->all());
        return redirect()->route('index')->with("alert", __('messages.success'));
    }

    public function show(Video $video)
    {
        $video->load('comments.user');
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        $categories = Category::all();
        return view('videos.edit', compact('video', 'categories'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());
        return redirect()->route('videos.show', $video->slug)->with('alert', __('messages.video_updated'));
    }

}
