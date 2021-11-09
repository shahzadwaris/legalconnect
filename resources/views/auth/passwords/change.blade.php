@extends('layouts.nurse')
@section('contents')
@if ($user->type == 1)
@include('nurses.partials.sidebar')
@else{
@include('providers.partials.sidebar')
}
@endif
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Change Password</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->

        <div class="row">

            <div class="col-sm-12">
                <div class="white-box">
                    <div class="flash-message" id='success-alert'>
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                        @endforeach
                    </div>
                    <form action="{{route('changePassword.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Current Password </label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="oldPassword" required><br>
                            </div>
                            @error('oldPassword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">New Password </label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" required><br>
                            </div>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Confirm Password </label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password_confirmation" required><br>
                            </div>
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                </div>
                </form>
            </div>
        </div>



    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> 2021 &copy; Med Connect . <a href="mailto:contact@medconnectus.com">Contact
        Us</a></footer>
</div>
@endsection