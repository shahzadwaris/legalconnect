@extends('layouts.provider')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('providers.partials.sidebar')
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Manage Connections</h4>
                </div>
                {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="new-job.php" target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
                </div> --}}
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
                                        <th>Job Title</th>
                                        <th>Nurse</th>
                                        <th>Zip Code</th>
                                        <th>Years</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                    <tr>
                                        <td>{{$request->created_at->format('M d, Y')}}</td>
                                        <td>{{$request->job->jobTitle}}</td>
                                        <td><a
                                                href="{{route('provider.nurseProfile', $request->nurse->username)}}">{{$request->nurse->name}}</a>
                                        </td>
                                        <td>{{$request->nurse->worker->zip}}</td>
                                        <td>{{$request->nurse->worker->experienceInYears}}</td>
                                        <td>{{$request->nurse->worker->experiences}}</td>
                                        <td><span class="label label-megna label-rounded">ACCEPTED</span></td>
                                        <td><a href="{{route('provider.nurses.markHired', $request->id)}}"
                                                class="btn btn-success">HIRE
                                                NOW</a>
                                            <a class="popup-with-form btn btn-warning" href="#test-form">REQUEST MORE
                                                INFO</a>
                                            <form id="test-form" class="mfp-hide white-popup-block"
                                                action="{{route('provder.message.store')}}" method="POST">
                                                @csrf
                                                <h1>Request More Info</h1>
                                                <fieldset style="border:0;">
                                                    <p>Start a conversation with <strong></strong>.</p>

                                                    <div class="form-group">
                                                        <input type="hidden" value="{{$request->nurse->id}}"
                                                            name="nurse">
                                                        <br>
                                                        <textarea class="form-control" id="textarea" rows="5"
                                                            name="message"
                                                            placeholder="Type a message here..."></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="btn btn-success" type="submit" value="Send">
                                                    </div>
                                                </fieldset>
                                            </form>





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
                href="mailto:contact@legalconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('css')
<link href="{{asset('plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">
@endsection
@section('js')
<!-- Magnific popup JavaScript -->
<script src="{{asset('plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
@endsection