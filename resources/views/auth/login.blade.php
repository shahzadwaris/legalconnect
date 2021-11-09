@extends('layouts.theme')
@section('title')
Login
@endsection
@section('contents')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="{{asset('assets/img/hero/about.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-20 pb-120">
        <div class="container">
            {{-- <div class="section-top-border"> --}}
                <div class="row">
                    <div class="col-lg-8 offset-md-2">
                        <h3 class="mb-30 text-center">Login</h3>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="mt-10">
                                <input type="text" name="username" placeholder="Username or Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required=""
                                    class="single-input">
                            </div>
                            @error('username')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <div class="mt-10">
                                <input type="password" name="password" placeholder="Password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required=""
                                    class="single-input">
                            </div>
                            @error('password')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <div class="mt-2">
                                <span><a class="text-danger" href="{{ route('password.request') }}">Forgot
                                        Password?
                                </span>
                            </div>
                            <button class="btn btn-block btn-block mt-4">Login</button>
                        </form>
                    </div>
                </div>
                {{--
            </div> --}}
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection