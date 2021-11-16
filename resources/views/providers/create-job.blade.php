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
          <h4 class="page-title">Create Job Post</h4>
        </div>
        {{-- <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <a href="new-job.php" target="_blank"
            class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
            Job Post</a>
        </div> --}}
      </div>
      <!-- /.row -->
      <!-- .row -->
      <div class="row">

        <div class="col-md-12 col-xs-12">
          <div class="white-box">
            <div class="flash-message" id='success-alert'>
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))

              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                  data-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
              @endforeach
            </div>
            <ul class="nav nav-tabs tabs customtab">
              <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                      class="fa fa-user"></i></span> <span>
                    Please Create Your Job Posting
                  </span> </a> </li>
            </ul>
            <div class="tab-content">


              <div class="tab-pane active" id="settings">
                <form class="form-horizontal form-material" action="{{route('provider.job.store')}}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="col-md-12">Job Title</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="title" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Type of Job </label>
                    <div class="col-md-12">
                      <div class="radio radio-info">
                        <input type="radio" name="type" id="radio34" value="Full Time">
                        <label for="radio34"> Full Time </label>
                      </div>

                      <div class="radio radio-info">
                        <input type="radio" name="type" id="radio33" value="Temporary">
                        <label for="radio33"> Temporary </label>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="form-group mt-5" id="temporary" style="display: none;">
                    <label class="col-md-12">How Long?</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="temporary" value="" required>
                    </div>
                  </div> --}}
                  <div class="row">
                    <div class="col-md-3" style="margin-top: .3rem;">
                      <div class="form-group">
                        <label>Location of Job by Zip Code </label>
                        {{-- <div class="col-md-12"> --}}
                          <input type="text" class="form-control form-control-line" name="zip" value="" required>
                          {{--
                        </div> --}}
                      </div>
                    </div>
                    <div class="col-md-3 ml-4">
                      <div class="form-group">
                        <label class="control-label">Length of Job (if not full time)</label>
                        <input type="text" name="length" class="form-control" value="">
                      </div>
                    </div>
                    <div class="col-md-3 ml-4">
                      <div class="form-group">
                        <label class="control-label">Shift/Hours </label>
                        <input type="text" name="hours" class="form-control" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Minimum Requirements</label>
                    <div class="col-md-12">
                      <textarea class="form-control form-control-line" rows="5" name="requirements"
                        required> </textarea>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="control-label">Pay Range</label>
                        <div class="input-group m-t-10"> <span class="input-group-addon"><i
                              class="fa fa-dollar"></i></span>
                          <input type="text" id="example-input3-group1" style="padding-left: 1rem;" name="pay"
                            class="form-control" value="" placeholder="3000-6000">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" style="margin-top: 1.2rem;">
                        <label class="col-md-12">Pay Duration/Type</label>
                        <div class="col-md-12">
                          <select name="pay_type" class="form-control" id="category">
                            <option value="">Select</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Yearly">Yearly</option>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" style="margin-top: 1.2rem;">
                        <label class="col-md-12">Category</label>
                        <div class="col-md-12">
                          <select name="category" class="form-control" id="category">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->slug}}">{{$category->title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">More information about Job (optional)</label>
                    <div class="col-md-12">
                      <textarea class="form-control form-control-line" rows="5" name="more"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Please Check the following experience you have?
                    </label>
                    @php
                    $experiences = [];
                    // if($user->worker)
                    // {
                    // $experiences = explode(',', $user->worker->experiences);
                    // }

                    @endphp
                    <div class="col-md-12">
                      @foreach ($categories as $item)
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="checkbox checkbox-info">
                          <input id="{{$item->title}}" type="checkbox" name="specialties[]" value="{{$item->title}}">
                          <label for="{{$item->title}}"> {{$item->title}} </label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>




                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-success" type="submit">Submit</button>
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
    <footer class="footer text-center"> 2021 &copy; Med Connect . <a href="mailto:contact@medconnectus.com">Contact
        Us</a></footer>
  </div>
  <!-- /#page-wrapper -->
</div>
@endsection