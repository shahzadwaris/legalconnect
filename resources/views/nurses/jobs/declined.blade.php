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
                    <h4 class="page-title">Declined Applications</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="withdraw.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Withdraw Balance</a> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($declineds as $a)
                                    <tr>
                                        <td>{{$a->created_at->format('d M, Y')}}</td>
                                        <td>{{$a->firm->name}}</td>
                                        <td>{{$a->job->jobTitle}}</td>
                                        <td>{{$a->job->type}}</td>
                                        <td>{{$a->job->jobLength}}</td>
                                        <td>{{$a->job->shiftHours}}</td>
                                        <td>{{$a->job->salary}}</td>
                                        <td><span class="label label-megna label-rounded">{{$a->status}}</span></td>
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
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@legalconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection