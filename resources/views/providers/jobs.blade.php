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
                    <h4 class="page-title">My Job Posts</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="{{route('provider.job.create')}}"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
                </div>
            </div>
            <!-- /.row -->

            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="flash-message" id='success-alert'>
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @endforeach
                        </div>
                        <div class="table-responsive">


                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Zip Code</th>
                                        <th>Type</th>
                                        <th>Length</th>
                                        <th>Hours</th>
                                        <th>Pay</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{$job->created_at}}</td>
                                        <td>{{$job->jobTitle}}</td>
                                        <td>{{$job->zip}}</td>
                                        <td>{{$job->type}}</td>
                                        <td>{{$job->jobLength}}</td>
                                        <td>{{$job->shiftHours}}</td>
                                        <td>${{$job->salary}}</td>
                                        <td>{{$job->status}}</td>
                                        <td><a href="{{route('provider.job.edit',$job->id)}}"
                                                class='btn btn-sm btn-danger'><i class="fas fa-edit"></i></a>
                                            <a href="{{route('provider.job.destroy',$job->id)}}"
                                                class='btn btn-sm btn-danger'><i class="fas fa-trash"></i></a>
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
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection