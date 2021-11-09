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
                    <h4 class="page-title">Active Employments</h4>
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
                        <div class="table-responsive">


                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Job Type</th>
                                        <th>Employer</th>
                                        <th>Start Date</th>
                                        <th>Earnings</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hireds as $hired)
                                    <tr>
                                        <td>{{$hired->job->jobTitle}}</td>
                                        <td>{{$hired->job->type}}</td>
                                        <td><a
                                                href="{{route('nurse.providerProfile', $hired->provider->username)}}">{{$hired->provider->name}}</a>
                                        </td>
                                        <td>{{$hired->updated_at->format('M d, Y')}}</td>
                                        <td>

                                            $
                                        </td>
                                        <td>
                                            {{$hired->status}}
                                        </td>
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