@extends('layouts.provider')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('providers.partials.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="{{route('provider.job.create')}}" target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
                </div> --}}
            </div>
            <!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <div class="flash-message" id='success-alert'>
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @endforeach
                        </div>
                        <h3 class="box-title"> <a href="jobs.php">Active Job Posts</a></h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-success"></i></sup>
                                {{$active}}
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"> <a href="hired.php">Hired Workers</a></h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-danger"></i></sup>

                                {{$hired}}
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"> <a href="payments.php">Total Spent</a></h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-info"></i></sup>


                                ${{$payments}}
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>

            </div>

            <!--row -->




        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection