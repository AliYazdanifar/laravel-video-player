@extends('layout')
@section('content')
    {{--    latest videos--}}
    <x-latest-videos></x-latest-videos>
    {{--end latest videos--}}
    <h1 class="new-video-title"><i class="fa fa-bolt"></i> پربازدیدترین ویدیوها</h1>
    <div class="row">
        @foreach($mostViewedVideos as $video)
            <x-video-box :video="$video"/>
        @endforeach
    </div>

    <h1 class="new-video-title"><i class="fa fa-bolt"></i> محبوب‌ترین‌ها</h1>
    <div class="row">
        @foreach($mostPopularVideos as $video)
            <x-video-box :video="$video"/>

        @endforeach
    </div>

@endsection
