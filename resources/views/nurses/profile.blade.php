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
          <h4 class="page-title">My Profile</h4>
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

              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                  data-dismiss="alert" aria-label="close">&times;</a></p>
              @endif
              @endforeach
            </div>
            <ul class="nav nav-tabs tabs customtab">
              <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                      class="fa fa-user"></i></span> <span>
                    These information will be kept private and not be shared with anyone. Firms will
                    identify you by user name.
                  </span> </a> </li>
            </ul>
            <div class="tab-content">


              <div class="tab-pane active" id="settings">
                <form class="form-horizontal form-material" action="{{route('nurse.personalDetails')}}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="col-md-12">Full Legal Name</label>
                    <div class="col-md-12">
                      <input type="text" value="{{$user->name ?? old('name')}}" class="form-control form-control-line"
                        name="name" required>
                      @error('name')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-md-12">Email Address</label>
                    <div class="col-md-12">
                      <input type="email" class="form-control form-control-line" name="email" id="email"
                        value="{{$user->email}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date" class="col-md-12">Date of Birth</label>
                    <div class="input-group date" data-provide="datepicker">
                      <input type="text" name="dob" value="{{$user->worker->dob ?? ''}}"
                        class="form-control form-control-line pl-2">
                      <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                      </div>
                    </div>
                    @error('dob')
                    <span class="text-danger">
                      {{$message}}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-12">
                    <label class="col-md-12">Home Address</label>
                    <div class="col-md-12">
                      <input type="text" value="{{$user->worker->address ?? ""}}" class="form-control form-control-line"
                        name="address" value="" required>
                    </div>
                    @error('address')
                    <span class="text-danger">
                      {{$message}}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group col-12">
                    <label class="col-md-12">Profession</label>
                    <div class="col-md-12">
                      <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id ==
                          $user->worker->category_id ? 'selected' : ''}}>{{$category->title}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    @error('address')
                    <span class="text-danger">
                      {{$message}}
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Do you have an LLM?
                      (optional)</label>
                    <div class="col-md-12">
                      <div class="radio radio-info">
                        <input type="radio" name="llm" id="yes" value="Yes" @if($user->worker)
                        @if ($user->worker->llm == 1)
                        checked
                        @endif
                        @endif />
                        <label for="yes"> Yes </label>
                      </div>
                      <div class="radio radio-info">
                        <input type="radio" name="llm" id="no" value="No" @if($user->worker)
                        @if ($user->worker->llm == 0)
                        checked
                        @endif
                        @endif />
                        <label for="no"> No </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-success" type="submit">Update</button>
                      <a class="btn btn-warning" href="{{route('changePassword.index')}}">Change Password</a>
                      <a class="btn btn-danger" href="{{route('nurse.deleteProfile')}}">Delete Profile</a>
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
                    The following information will be seen by Firm
                  </span> </a> </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal form-material" action="{{route('nurse.updateMedicalProviderDetails')}}"
                  method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="col-md-12">Username</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="username"
                        value="{{$user->username}}" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="zip" class="col-md-12">Location Zip Code</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="zip" id="zip"
                        value="{{$user->worker->zip ?? ""}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bars" class="col-md-12">If you are an Attorney which State Bars have you passed?</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control form-control-line" name="bars" id="bars"
                        value="{{$user->worker->bars ?? ""}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="col-md-12">Preferred Pay/Salary (Optional)</label>
                    <div class="col-md-12">
                      <div class="input-group m-t-10"> <span class="input-group-addon"><i
                            class="fa fa-dollar"></i></span>
                        <input type="text" required id="salary" name="salary" value="{{$user->worker->salary ?? ""}}"
                          class="form-control">
                      </div>

                    </div>
                  </div>
                  {{-- <div class="form-group">
                    <label for="example-email" class="col-md-12">Willing to travel? </label>
                    <div class="col-md-12">

                      <div class="radio radio-info">
                        <input type="radio" required name="travel" id="travel" value="1" @if ($user->worker)
                        @if ($user->worker->travel == 1)
                        checked
                        @endif
                        @endif>
                        <label for="travel"> YES </label>
                      </div>

                      <div class="radio radio-info">
                        <input type="radio" required name="travel" id="travel-mo" value="0" @if ($user->worker)
                        @if ($user->worker->travel == 0)
                        checked
                        @endif
                        @endif>
                        <label for="travel-mo"> NO </label>
                      </div>

                    </div>
                  </div> --}}
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">How many years of experience do you have?</label>
                    <div class="col-md-12">

                      <div class="radio radio-info">
                        <input type="radio" required name="years" id="lessthenyear" value="1" @if ($user->worker)
                        @if ($user->worker->experienceInYears == 1)
                        checked
                        @endif
                        @endif>
                        <label for="lessthenyear"> Less than 1 Year </label>
                      </div>

                      <div class="radio radio-info">
                        <input type="radio" required name="years" id="24years" value="2" @if ($user->worker)
                        @if ($user->worker->experienceInYears == 2)
                        checked
                        @endif
                        @endif
                        >
                        <label for="24years"> 2-4 Years </label>
                      </div>

                      <div class="radio radio-info">
                        <input type="radio" required name="years" id="59years" value="3" @if ($user->worker)
                        @if ($user->worker->experienceInYears == 3)
                        checked
                        @endif
                        @endif
                        >
                        <label for="59years"> 5-9 years </label>
                      </div>

                      <div class="radio radio-info">
                        <input type="radio" required name="years" id="10years" value="4" @if ($user->worker)
                        @if ($user->worker->experienceInYears == 4)
                        checked
                        @endif
                        @endif
                        >
                        <label for="10years"> 10 or more years </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Please Check the following experience you have?
                    </label>
                    @php
                    $experiences = [];
                    if($user->worker)
                    {
                    $experiences = explode(',', $user->worker->experiences);
                    }

                    @endphp
                    <div class="col-md-12">
                      @foreach ($categories as $item)
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="checkbox checkbox-info">
                          <input id="{{$item->title}}" type="checkbox" {{in_array($item->title, $experiences) ?
                          'checked'
                          : '' }} name="experiences[]" value="{{$item->title}}">
                          <label for="{{$item->title}}"> {{$item->title}} </label>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Please list any other proficiencies or skills you would like a Medical
                      Provider to know about (Optional).</label>
                    <div class="col-md-12">
                      <textarea class="form-control form-control-line" rows="5"
                        name="about">{{$user->worker->about ?? ''}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12" for="license">Upload any professional license. (Optional)</label>
                    <div class="col-md-12">
                      <input type="file" name="license" id="license">
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
    <footer class="footer text-center"> 2021 &copy; Legal Connect . <a href="mailto:contact@medconnectus.com">Contact
        Us</a></footer>
  </div>
  <!-- /#page-wrapper -->
</div>
@endsection
@section('css')
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
  integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
  integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(function(){
      $('.datepicker').datepicker({
        format: 'mm/dd/yyyy'
      });
    });
</script>
<script src="https://js.stripe.com/v3/"></script>
<script>
  // Custom styling can be passed to options when creating an Element.
      var stripe = Stripe("{{config('services.stripe.publishable')}}");
      var submitButton = document.getElementById('addBankInfo');
  
      $(document).ready(function() {
        $(submitButton).on('click', function(e) {
          e.preventDefault();
          var form = document.getElementById('bankForm');
          var accountholderName = $('#ahfn').val() + " " + $('#ahln').val();
          var routingNumber = $('#routingNumber').val();
          var accountNumber = $('#accountNumber').val();
          // var accountType = document.getElementById('account-type').value;
          stripe
            .createToken('bank_account', {
              country: 'US',
              currency: 'usd',
              routing_number: routingNumber,
              account_number: accountNumber,
              account_holder_name: accountholderName,
              account_holder_type: 'individual',
            })
            .then(function(result) {
              if (result.token) {
                $("<input />").attr("type", "hidden")
                  .attr("name", "stripeToken")
                  .attr("value", result.token.id)
                  .appendTo(form);
                $("<input />").attr("type", "hidden")
                  .attr("name", "bank_id")
                  .attr("value", result.token.bank_account.id)
                  .appendTo(form);
  
                $(form).submit();
              } else {
                $("#error").html(result.token.error.message);
              }
  
              return false;
  
            });
          return false;
  
        });
      });
</script>
@endsection