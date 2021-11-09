@extends('admin.layouts.admin')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('admin.partials.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Create Admin</h4>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="flash-message" id='success-alert'>
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @endforeach
                        </div>
                        <h3 class="box-title m-b-0"></h3>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" action="{{route('admin.store')}}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Enter Username</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="username"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Enter Email</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control form-control-line" name="password"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12" style="margin-top: 2rem;">
                                            <button class="btn btn-success mt-3" type="submit">Create Admin</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2021 &copy; MedConnect.</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection

@section('css')
<link href="{{asset('admin/css/select2.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('admin/js/select2.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#provider').select2();
    });
</script>
@endsection