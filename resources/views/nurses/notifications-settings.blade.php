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
                    <h4 class="page-title">Notification Settings</h4>
                </div>
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
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" action="{{route('notifications.update')}}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Account Email Notifications?
                                        </label>
                                        <div class="col-md-12">
                                            <div class="radio radio-info">
                                                <input type="radio" name="email" id="radio21" value="1"
                                                    {{$settings->email == 1 ? 'checked' : ''}}>
                                                <label for="radio21"> YES </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="email" id="radio22" value="0"
                                                    {{$settings->email == 0 ? 'checked' : ''}}>
                                                <label for="radio22"> NO </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Would you like to opt in for
                                            Marketing
                                            Emails? </label>
                                        <div class="col-md-12">
                                            <div class="radio radio-info">
                                                <input type="radio" name="marketing" id="radio31" value="1"
                                                    {{$settings->marketing == 1 ? 'checked' : ''}}>
                                                <label for="radio31"> YES </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="marketing" id="radio32" value="0"
                                                    {{$settings->marketing == 0 ? 'checked' : ''}} />
                                                <label for="radio32"> NO </label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Update</button>
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
    </div>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> 2021 &copy; Legal Connect . <a href="mailto:contact@medconnectus.com">Contact
        Us</a></footer>
</div>
<!-- /#page-wrapper -->
</div>
@endsection