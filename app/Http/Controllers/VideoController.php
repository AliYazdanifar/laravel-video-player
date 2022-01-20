<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create(){
        return view('videos/create');
    }

    public function store(StoreVideoRequest $request){
        Video::create($request->all());
        return redirect()->route('index')->with("alert", __('messages.success'));
    }

    public function show(Request $request,int $id){
        $video=Video::find($id);
        return view('videos.show',compact('video'));

    }
}
