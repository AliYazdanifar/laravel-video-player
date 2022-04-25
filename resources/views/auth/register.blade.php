@extends('layouts.auth-layout')
@section('title','ثبت نام')
@section('body-class','sign-up-page')
@section('content')


    <!--======= log_in_page =======-->
    <div id="log-in" class="site-form log-in-form">

        @if($errors->any())
            <div class="alert alert-danger">
                <h5>قبل از ادامه لطفا خطاهای زیر را برطرف کنید</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="log-in-head">
            <h1>ثبت نام</h1>
            <div id="logo"><a href="{{route('index')}}"><img src="img/logo.png" alt=""></a></div>
        </div>

        <div class="form-output">
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label" for="name">@lang('text.firstName')</label>
                    <input class="form-control" placeholder="" id="name" name="name" type="text">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="email">@lang('text.email')</label>
                    <input class="form-control" placeholder="" name="email" type="email" id="email">
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="password">@lang('text.password')</label>
                    <input class="form-control" placeholder="" id="password" name="password" type="password">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">@lang('text.confirmPassword')</label>
                    <input class="form-control" id="password_confirmation" placeholder="" name="password_confirmation" type="password">
                </div>

                <div class="remember">
                    <div class="checkbox">
                        <label>
                            <input name="chk-accept-rules" type="checkbox">
                            <a href="#">@lang('text.acceptRules')</a>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-primary full-width">ثبت نام</button>>

                <div class="or"></div>

                <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook"
                                                                                       aria-hidden="true"></i>ورود با
                    فیس بوک</a>

                <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter"
                                                                                      aria-hidden="true"></i>ورود با
                    توییتر</a>


                <p>شما یک حساب کاربری دارید؟ <a href="{{route('login')}}"> ورود!</a></p>
            </form>
        </div>
    </div>
    <!--======= // log_in_page =======-->


@endsection
