@extends('layouts.theme')
@section('title')
Reset Password
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
                            <h2>Reset Password</h2>
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
                        <h3 class="mb-30 text-center">Reset Password</h3>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mt-10">
                                <input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'" required="" class="single-input"
                                    value="{{ $email ?? old('email') }}">
                            </div>
                            @error('email')
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
                            <div class="mt-10">
                                <input type="password" name="password_confirmation" placeholder="Password Confirmation"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Confirmation'"
                                    required="" class="single-input">
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <button class="btn btn-block btn-block mt-4">Reset Passowrd</button>
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