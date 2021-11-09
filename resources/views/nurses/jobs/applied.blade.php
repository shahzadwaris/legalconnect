@extends('layouts.nurse')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('nurses.partials.sidebar')
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Applied Jobs</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="withdraw.php"
                class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Withdraw
                Balance</a> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
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
                        <div class="table-responsive">


                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employer</th>
                                        <th>Job Title</th>
                                        <th>Job Type</th>
                                        <th>Job Length</th>
                                        <th>Shift/Hours</th>
                                        <th>Pay</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applied as $a)
                                    <tr>
                                        <td>{{$a->created_at->format('d M, Y')}}</td>
                                        <td>{{$a->provider->name}}</td>
                                        <td>{{$a->job->jobTitle}}</td>
                                        <td>{{$a->job->type}}</td>
                                        <td>{{$a->job->jobLength}}</td>
                                        <td>{{$a->job->shiftHours}}</td>
                                        <td>{{$a->job->salary}}</td>
                                        <td><span class="label label-megna label-rounded">{{$a->status}}</span></td>
                                        <td><a href="{{route('apply.destroy', $a->id)}}"
                                                class="btn btn-danger btn-rounded">REVOKE APPLICATION</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->





        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2021 &copy; Med Connect . <a href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection