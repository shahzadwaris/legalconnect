@extends('layouts.provider')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('nurses.partials.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Nurse's Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="new-job.php" target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- .row -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <div class="user-btm-box">
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Username</strong>
                                    <p>
                                        {{$nurse->username}}
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Preferred Pay/Salary</strong>
                                    <p>$
                                    </p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Willing to travel?</strong>
                                    <p>
                                        {{$nurse->nurse->travel}}
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Years of experience</strong>
                                    <p>
                                        {{$nurse->nurse->travel}}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Level 4 APRN?</strong>
                                    <p>
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Experience</strong>
                                    <p>
                                        {{$nurse->nurse->experienceInYears}}
                                    </p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Location Zip Code</strong>
                                    <p>
                                        {{$nurse->nurse->zip}}
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Other Skills</strong>
                                    <p>
                                        {{$nurse->nurse->experiences}}
                                    </p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>


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
<!-- /#wrapper -->
@endsection