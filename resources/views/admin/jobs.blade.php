@extends('layouts.admin')
@section('title')
Jobs
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jobs</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.jobs.create')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Create Job</a>
            </div>
        </div>
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
            <h6 class="m-0 font-weight-bold text-primary">All Jobs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Zip Code</th>
                            <th>Category</th>
                            <th>type</th>
                            <th>Medical Provider</th>
                            <th>Job Length</th>
                            <th>Shift Hours</th>
                            <th>Requirements</th>
                            <th>Specialties</th>
                            <th>Pay</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Zip Code</th>
                            <th>Categoy</th>
                            <th>type</th>
                            <th>Medical Provider</th>
                            <th>Job Length</th>
                            <th>Shift Hours</th>
                            <th>Requirements</th>
                            <th>Specialties</th>
                            <th>Pay</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->jobTitle}}</td>
                            <td>{{$job->zip}}</td>
                            <td>{{$job->categoryDetails->title ?? ''}}</td>
                            <td>{{$job->type}}</td>
                            <td>{{$job->provider->name ?? ''}}</td>
                            <td>{{$job->jobLength}}</td>
                            <td>{{$job->shiftHours}}</td>
                            <td>{{$job->requirements}}</td>
                            <td>{{$job->specialties}}</td>
                            <td>{{is_numeric($job->salary) ? '$'.$job->salary : $job->salary}}</td>
                            <td>{{$job->created_at->format('M d, Y H:i')}}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{route('admin.jobs.edit', $job->id)}}"><i
                                        class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-success ml-2" target="_blank"
                                    href="{{route('home.jobs.show', $job->slug)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-danger  ml-5" href="{{route('admin.jobs.destroy', $job->id)}}"
                                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                                        class="fa fa-trash"></i></a>
                            </td>
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