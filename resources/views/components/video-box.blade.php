<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="video-item">
        <div class="thumb">
            <div class="hover-efect"></div>
            <small class="time">{{$video->LengthForHuman}}</small>
            <a href="{{route('videos.show',$video->slug)}}"><img src="{{$video->thumbnail}}" alt="{{$video->name}}"></a>
        </div>
        <div class="video-info">
            <a href="{{route('videos.show',$video->slug)}}" class="title">{{$video->name}}</a>
            <a class="channel-name" href="#">{{$video->user_name}}<span>
                                    <i class="fa fa-check-circle"></i></span>
            </a>

            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
            <span class="date"><i class="fa fa-clock-o"></i>{{$video->created_at}}</span>
            <a href="{{route('videos.edit',$video->slug)}}" class="float-right"><i class="fa fa-pencil"></i></a>
            <span class="date"><i class="fa fa-tag"></i>tttt</span>

        </div>
    </div>
</div>
