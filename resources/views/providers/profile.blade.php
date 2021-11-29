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
                    <h4 class="page-title">Profile</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="{{route('provider.job.create')}}" target="_blank"
                        class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Create
                        Job Post</a>
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

                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                                            class="fa fa-user"></i></span> <span>
                                        These information will be kept private and not be shared with anyone.
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material"
                                    action="{{route('provider.updateBusinessDetails')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12" for="businessName">Name of Business</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" id="businessName"
                                                name="businessName" value="{{$user->name ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="HiringPerson">Name of Person for Hiring </label>
                                        <div class="col-md-12">
                                            <input type="text" id="HiringPerson" class="form-control form-control-line"
                                                name="hiringPerson" value="{{$user->firm->hiringPerson ?? ''}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="primaryemail" class="col-md-12">Email Address (Hiring
                                            Person)</label>
                                        <div class="col-md-12">
                                            <input type="email" id="primaryemail" class="form-control form-control-line"
                                                name="hiringPersonEmail" value="{{$user->email ?? ''}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="primaryphone" class="col-md-12">Phone Number (Hiring
                                            Person)</label>
                                        <div class="col-md-12">
                                            <input type="number" id="primaryphone"
                                                class="form-control form-control-line" name="hiringPersonPhone"
                                                value="{{$user->firm->hiringPersonPhone ?? ''}}" required>
                                        </div>
                                    </div>
                                    <h3>Contact information for Payments</h3>

                                    <input type="checkbox" id="same" name="same" onchange="addressFunction()" />
                                    <label for="same">
                                        Same as above
                                    </label> <br><br>

                                    <div class="form-group">
                                        <label class="col-md-12" for="secondaryname">Name</label>
                                        <div class="col-md-12">
                                            <input type="text" id="secondaryname" class="form-control form-control-line"
                                                name="paymentPersonName"
                                                value="{{$user->firm->paymentPersonName ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="secondaryemail" class="col-md-12">Email Address</label>
                                        <div class="col-md-12">
                                            <input type="email" id="secondaryemail"
                                                class="form-control form-control-line" name="paymentPersonEmail"
                                                value="{{$user->firm->paymentPersonEmail ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="secondaryphone" class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <input type="number" id="secondaryphone"
                                                class="form-control form-control-line" name="paymentPersonPhone"
                                                value="{{$user->firm->paymentPersonPhone ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input required checked name="terms" type="checkbox"
                                                class="custom-control-input" id="customControlAutosizing">
                                            <label class="custom-control-label" for="customControlAutosizing">I have
                                                read and I agree to the <a class="text-danger"
                                                    href="{{route('home.provider.terms')}}" target="_blank">Terms
                                                    and
                                                    Conditions
                                                    </span></label>
                                        </div>
                                        @error('terms')
                                        <span class="text-danger">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Update</button>
                                            <a class="btn btn-warning" href="{{route('changePassword.index')}}">Change
                                                Password</a>
                                            <a class="btn btn-danger" href="{{route('provider.deleteProfile')}}">Delete
                                                Profile</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                                            class="fa fa-user"></i></span> <span>
                                        The following information will be seen by Nurses searching for jobs.
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material"
                                    action="{{route('provider.updateBusiness')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="username"
                                                value="{{$user->username}}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Type of Business </label>
                                        <div class="col-md-12">

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio19" value="Law Firm"
                                                    @if($user->firm)
                                                @if ($user->firm->businessType == 'Law Firm')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="radio19"> Law Firm </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio19" value="Other"
                                                    @if($user->firm)
                                                @if ($user->firm->businessType == 'Other')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="radio19"> Other </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="zip" class="col-md-12">Location Zip Code</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="zip"
                                                id="zip" value="{{$user->firm->zip ?? ""}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employees" class="col-md-12">How many Attorneys do you
                                            employ?</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="employees"
                                                id="employees" value="{{$user->firm->employees ?? ""}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Years in Business </label>
                                        <div class="col-md-12">

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio14" value="0-3 years"
                                                    @if($user->firm)
                                                @if ($user->firm->experince == '0-3 years')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="radio14"> 0-3 years </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio15" value="4-10 years"
                                                    @if($user->firm)
                                                @if ($user->firm->experince == '4-10 years')
                                                checked
                                                @endif
                                                @endif/>
                                                <label for="radio16"> 4-10 years </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio17" value="Over 10 years"
                                                    @if($user->firm)
                                                @if ($user->firm->experince == 'Over 10 years')
                                                checked
                                                @endif
                                                @endif/>
                                                <label for="radio17"> Over 10 years </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">What areas does your Law Firm
                                            specialize in?
                                        </label>
                                        @php
                                        $experiences = [];
                                        if($user->firm)
                                        {
                                        $experiences = explode(',', $user->firm->specialize);
                                        }

                                        @endphp
                                        <div class="col-md-12">
                                            @foreach ($categories as $item)
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="checkbox checkbox-info">
                                                    <input id="{{$item->title}}" type="checkbox"
                                                        {{in_array($item->title, $experiences) ?
                                                    'checked'
                                                    : '' }} name="experiences[]" value="{{$item->title}}">
                                                    <label for="{{$item->title}}"> {{$item->title}} </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Is there any other information you would like to tell
                                            applicants about your firm?</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control form-control-line" rows="5"
                                                name="about">{{$user->firm->about ?? ""}}</textarea>
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
        <!-- /.container-fluid -->
        <footer class="footer text-center"> {{date('Y')}} &copy; Legal Connect . <a
                href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('js')
<script>
    function addressFunction() {
          if (document.getElementById(
              "same").checked) {
            document.getElementById(
                "secondaryname").value =
              document.getElementById(
                "HiringPerson").value;
    
            document.getElementById(
                "secondaryemail").value =
              document.getElementById(
                "primaryemail").value;
    
            document.getElementById(
                "secondaryphone").value =
              document.getElementById(
                "primaryphone").value;
          } else {
            document.getElementById(
              "secondaryname").value = "";
            document.getElementById(
              "secondaryemail").value = "";
            document.getElementById(
              "secondaryphone").value = "";
          }
        }
</script>
{{-- <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script> --}}

@endsection