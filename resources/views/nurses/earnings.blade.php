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
                    <h4 class="page-title">My Earnings</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="withdraw.php"
            class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Withdraw
            Balance</a> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"><i class="ti-wallet text-success"></i> Available Balance</h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-success"></i></sup> $ </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"><i class="ti-wallet text-danger"></i> Withdrawn</h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-danger"></i></sup>
                                $
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"><i class="ti-wallet text-info"></i> Total Earnings</h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-info"></i></sup>

                                $
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>

            </div>

            <!--row -->







            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">EARNINGS HISTORY</h3>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


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