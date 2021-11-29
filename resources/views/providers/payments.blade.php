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
                    <h4 class="page-title">Payments</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="{{route('provider.payment.create')}}"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Payment</a>
                    <a href="{{route('sub.show')}}"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Manage
                        Membership</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->
            <div class="row">
                <div class="flash-message" id='success-alert'>
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                            data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="white-box">

                        <h3 class="box-title"><i class="text-danger"></i> Payments Today</h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-danger"></i></sup>


                                ${{$total}}
                            </h1>
                        </div>
                        {{-- <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100" style="width:100%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title"><i class="text-info"></i> Total Payments</h3>
                        <div class="text-right">
                            <h1><sup><i class=" text-info"></i></sup>

                                ${{$today}} </h1>
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
                        <h3 class="box-title m-b-0">PAYMENTS HISTORY</h3>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->created_at}}</td>
                                        <td>{{$payment->amount}}</td>
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