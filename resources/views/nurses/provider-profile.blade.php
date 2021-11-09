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
                    <h4 class="page-title">Medical Provider's Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="withdraw.php"
                      class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Withdraw
                      Balance</a> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <div class="user-btm-box">
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Username</strong>
                                    <p>
                                        {{$provider->username}}
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Type of Business</strong>
                                    <p>
                                        {{$provider->provider->businessType}}
                                    </p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-6 b-r"><strong>Location Zip Code</strong>
                                    <p>
                                        {{$provider->provider->zip}}
                                    </p>
                                </div>
                                <div class="col-md-6"><strong>Years in Business</strong>
                                    <p>
                                        {{$provider->provider->experince}}
                                    </p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <hr>
                            <!-- .row -->
                            <div class="row text-center m-t-10">
                                <div class="col-md-12"><strong>About Us</strong>
                                    <p>
                                        {{$provider->provider->about}}
                                    </p>
                                </div>
                            </div>
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
    @endsection