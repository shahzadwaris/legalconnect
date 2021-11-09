@extends('layouts.admin')
@section('title')
Update Admin
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Admin</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.show')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> View All Admins</a>
            </div>
        </div>
    </div>
    <div class="flash-message" id='success-alert'>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Details Here</h6>
        </div>
        <div class="card-body">

            <form class="form-horizontal form-material" action="{{route('admin.update', $admin->id)}}" method="POST" />
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" value="{{$admin->name}}" class="form-control @error('name') is-invalid @enderror"
                    name="name" id="name" placeholder="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>
                <input type="text" value="{{$admin->username}}"
                    class="form-control @error('username') is-invalid @enderror" name="username" id="username"
                    placeholder="username">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" value="{{$admin->email}}" class="form-control @error('email') is-invalid @enderror"
                    name="email" id="email" placeholder="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block mt-5">Update Admin</button>
                </div>
                <div class="col-md-2"></div>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection