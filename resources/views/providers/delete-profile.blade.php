@extends('layouts.nurse')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('providers.partials.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Delete Profile</h4>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-xs-12 mt-5">
                    <div class="white-box" style="padding-bottom: 5rem;">
                        <div class="tab-content active">


                            <div class="tab-pane active" id="settings">
                                <p><strong>Are you sure you want to delete your profile?</strong></p>
                                <p>
                                    Please note that this process is not reversible.
                                </p>
                                <a href="{{route('provider.destroy')}}"
                                    class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">Yes.
                                    Delete My Profile</a>
                                <a href="{{route('provider.index')}}"
                                    class="btn btn-success pull-right m-l-20 btn-rounded btn-outline waves-effect waves-light">No</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
@endsection