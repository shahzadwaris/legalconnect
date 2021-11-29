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
                    <h4 class="page-title">Hired Nurses</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="new-job.php" target="_blank"
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
                                        <th>Job Title</th>
                                        <th>Nurse</th>
                                        <th>Start Date</th>
                                        {{-- <th>Payments</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hireds as $hired)
                                    <td>{{$hired->job->jobTitle}}</td>
                                    <td><a
                                            href="{{route('provider.nurseProfile', $hired->nurse->username)}}">{{$hired->nurse->name}}</a>
                                    </td>
                                    <td>{{$hired->updated_at->format('M d, Y')}}</td>
                                    <td>
                                        @if ($hired->status == 'HIRED')
                                        <a href="{{route('provider.nurses.markCompleted', $hired->id)}}"
                                            class="btn btn-warning">JOB HAS
                                            ENDED?</a>
                                        @else
                                        <strong>{{$hired->status}}</strong>
                                    </td>
                                    @endif
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