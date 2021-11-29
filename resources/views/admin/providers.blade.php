@extends('layouts.admin')
@section('title')
Law Firms
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Law Firm</h1>
        {{-- <div class="row">
            <div class="col-12">
                <a href="{{route('admin.providers.charge')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-money-bill-alt fa-sm text-white-50 mr-1"></i>Charge
                    Provider</a>
            </div>
        </div> --}}
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
            <h6 class="m-0 font-weight-bold text-primary">All Law Firms</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Zip Code</th>
                            <th>Paid</th>
                            <th>Years in business</th>
                            <th>Type of business</th>
                            <th>Hiring person</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>No. of Employees</th>
                            <th>Experience</th>
                            <th>Specialize</th>
                            <th>Date Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Zip Code</th>
                            <th>Paid</th>
                            <th>Years in business</th>
                            <th>Type of business</th>
                            <th>Hiring person</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>No. of Employees</th>
                            <th>Experience</th>
                            <th>Specialize</th>
                            <th>Date Joined</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($providers as $provider)
                        <tr>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->firm->zip}}</td>
                            <td>{!! $provider->isPaid ? "<a class='btn-success btn-sm'>Paid</a>" : "<a
                                    class='btn-danger btn-sm'>Pending</a>" !!}
                            </td>
                            <td>{{$provider->firm->experince}}</td>
                            <td>{{$provider->firm->businessType}}</td>
                            <td>{{$provider->firm->hiringPerson}}</td>
                            <td>{{$provider->firm->hiringPersonEmail}}</td>
                            <td><a target='_blank'
                                    href="{{route('nurse.providerProfile', $provider->username)}}">{{$provider->username}}</a>
                            </td>
                            <td>{{$provider->firm->hiringPersonPhone}}</td>
                            <td>{{$provider->firm->employees}}</td>
                            <td>{{$provider->firm->experience}}</td>
                            <td>{{$provider->firm->specialize}}</td>
                            <td>{{$provider->firm->created_at->format('M d, Y')}}</td>
                            <td>
                                <a class="btn btn-sm btn-success " href="{{route('admin.provider.edit',
                                                                    $provider->id)}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-warning ml-2"
                                    href="{{route('admin.provider.suspend', $provider->id)}}">{{$provider->status
                                    == 'suspended' ? 'Activate' : 'SUSPEND'}}</a>
                                @if (!is_null($provider->isPaid))
                                <a class="btn btn-sm btn-danger"
                                    href="{{route('admin.provider.unpaid', $provider->id)}}"
                                    onclick="return confirm('Are you sure you want to mark this provider as unpaid?');"><i
                                        class="fa fa-dollar-sign"></i>
                                    Mark unPaid</a>

                                @else
                                <a class="btn btn-sm btn-danger" href="{{route('admin.provider.paid', $provider->id)}}"
                                    onclick="return confirm('Are you sure you want to mark this provider as paid?');"><i
                                        class="fa fa-dollar-sign"></i>
                                    Mark Paid</a>
                                @endif
                                <a class="btn btn-sm btn-danger  ml-5"
                                    href="{{route('admin.provider.destroy', $provider->id)}}"
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