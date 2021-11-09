@extends('layouts.nurse')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('nurses.partials.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Jobs</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="withdraw.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Withdraw Balance</a> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Search For Jobs</h3>
                        <form class="form-group" role="search" action="{{route('job.search')}}" method="GET">
                            <div class="input-group">


                                <input type="number" value="{{$zip ?? ''}}" id="example-input1-group2"
                                    style="width: 75%;" name="zip" class="form-control" placeholder="Enter Zip Code">

                                <select class="form-control" style="width: 25%;" name="radius">
                                    <option value="1000000">Select Radius</option>
                                    <option value="10">10 miles</option>
                                    <option value="20">20 miles</option>
                                    <option value="50">50 miles</option>
                                    <option value="100">100 miles</option>
                                </select>


                                <span class="input-group-btn"><button type="submit" name="submit"
                                        class="btn waves-effect waves-light btn-info"><i
                                            class="fa fa-search"></i></button></span>


                            </div>
                        </form>
                        <h2 class="m-t-40">


                        </h2>

                        <hr>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                @foreach ($jobs as $job)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$job->jobTitle}}<br> <small></small></div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <p><strong>Job Type:</strong> {{$job->type}}</p>
                                <p><strong>Length:</strong> {{$job->jobLength}}</p>
                                <p><strong>Hours:</strong> {{$job->shiftHours}}</p>
                                <p><strong>Pay:</strong> ${{$job->salary}}</p>
                                <p><strong>Minimum Requirements:</strong><br>{{$job->requirements}}</p>
                                <a href="{{route('apply.store', ['jobID' => $job->id, 'providerID' => $job->user_id])}}"
                                    class="btn btn-custom m-t-10">Connect</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

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