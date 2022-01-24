@extends('layout')
@section('content')
    <div id="upload">
        <div class="row">
            <x-validation-errors/>

            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>آپلود</span> ویدیو</h1>
                <form action="{{route('videos.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('videos.name')</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control"
                                   placeholder="@lang('videos.name')">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('videos.length')</label>
                            <input type="text" name="length" value="{{old('length')}}" class="form-control"
                                   placeholder="@lang('videos.length')">
                        </div>
                        <div class="col-md-6">
                            <label>نام یکتا</label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control"
                                   placeholder="نام یکتا">
                        </div>
                        <div class="col-md-6">
                            <label>آدرس ویدیو</label>
                            <input type="text" name="url" value="{{old('url')}}" class="form-control"
                                   placeholder="آدرس ویدیو">
                        </div>
                        <div class="col-md-6">
                            <label>تصویر بند‌انگشتی</label>
                            <input type="text" name="thumbnail" value="{{old('thumbnail')}}" class="form-control"
                                   placeholder="تصویر بند انگشتی">
                        </div>
                        <div class="col-md-6">
                            <label for="category">دسته بندی</label>
                            <select id="category" name="category_id">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="description" rows="4"
                                      placeholder="توضیح">{{old('description')}}</textarea>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div>
@endsection
