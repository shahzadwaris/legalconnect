@extends('layouts.provider')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('providers.partials.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Create New Payment</h4>
                </div>
                <!-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <a href="new-job.php" target="_blank"
                                    class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                                    New Payment</a>
                            </div> -->
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <div class="flash-message" id='success-alert'>
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @endforeach
                        </div>
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                                            class="fa fa-user"></i></span> <span>
                                        New Payment Details
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" action="{{route('provider.payment.store')}}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Enter Amount</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="amount"
                                                required>

                                            <div class="form-group">
                                                <div class="col-sm-12" style="margin-top: 2rem;">
                                                    <button class="btn btn-success mt-3" type="submit">Pay
                                                        Now</button>
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
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@legalconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
    @endsection