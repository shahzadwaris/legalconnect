@extends('layouts.admin')
@section('title')
Update Page
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Page</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Page Contents</h6>
        </div>
        <div class="card-body">

            <form class="form-horizontal form-material" action="{{route('page.update')}}" method="POST" />
            @csrf
            <input type="hidden" name="id" value="{{$page->id}}">
            <div class="form-group">
                <label for="title" class="font-weight-bold">Page Contents</label>
                <textarea class="ckeditor form-control" id="editir" name="contents">{!! $page->contents !!}</textarea>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block mt-5">Update Page</button>
                </div>
                <div class="col-md-2"></div>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
{{-- @extends('admin.layouts.admin')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('admin.partials.sidebar')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Nurse Terms & Conditions</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                        <h3 class="box-title m-b-0"></h3>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" action="{{route('page.update')}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$page->id}}">
                                    <div class="form-group">
                                        <label class="col-md-12">Page Contents</label>
                                        <div class="col-md-12">
                                            <textarea class="ckeditor form-control" id="editir"
                                                name="contents">{!! $page->contents !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12" style="margin-top: 2rem;">
                                            <button class="btn btn-success mt-3" type="submit">Update
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
        <footer class="footer text-center"> 2021 &copy; MedConnect.</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection --}}