@extends('layouts.admin')
@section('title')
Conversations
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Conversations</h1>
    </div>
    <div class="flash-message" id='success-alert'>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Conversations</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Provider</th>
                            <th>Nurse</th>
                            <th>Last Update</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Provider</th>
                            <th>Nurse</th>
                            <th>Last Update</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($conversations as $conversation)
                        <tr>
                            <td>{{$conversation->provider_id}}</td>
                            <td>{{$conversation->nurse_id}}</td>
                            <td>{{$conversation->updated_at->format('M d, Y')}}</td>
                            <td><a href='#' target='_blank'><strong>VIEW
                                        MESSAGES</strong></a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@section('css')
<link href="{{asset('bootstrap-admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection
@section('js')
<!-- Page level plugins -->
<script src="{{asset('bootstrap-admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bootstrap-admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
<!-- Page level custom scripts -->
<script src="{{asset('bootstrap-admin/js/demo/datatables-demo.js')}}"></script>
@endsection

{{-- @extends('admin.layouts.admin')
@section('contents')
<div id="wrapper">
    @include('admin.partials.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Active Conversations</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!-- <a href="payments.php"
                  class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Payments</a> -->

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0"></h3>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Provider</th>
                                        <th>Nurse</th>
                                        <th>Last Update</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($conversations as $conversation)
                                    <tr>
                                        <td>{{$conversation->provider_id}}</td>
                                        <td>{{$conversation->nurse_id}}</td>
                                        <td>{{$conversation->updated_at->format('M d, Y')}}</td>
                                        <td><a href='#' target='_blank'><strong>VIEW
                                                    MESSAGES</strong></a></td>

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
        <footer class="footer text-center"> 2021 &copy; MedConnect.</footer>
    </div>
    <!-- /#page-wrapper -->
</div>



@endsection --}}