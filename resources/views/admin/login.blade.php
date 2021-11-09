@extends('admin.layouts.admin')
@section('contents')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <div class="flash-message" id='success-alert'>
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>

            <form class="form-horizontal form-material" id="loginform" action="{{route('admin.login.process')}}"
                method="POST">
                @csrf
                <h3 class="box-title m-b-20">Admin Login</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="username" required placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required placeholder="Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                            type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection