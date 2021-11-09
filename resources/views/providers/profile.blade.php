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
                                                name="hiringPerson" value="{{$user->provider->hiringPerson ?? ''}}"
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
                                                value="{{$user->provider->hiringPersonPhone ?? ''}}" required>
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
                                                value="{{$user->provider->paymentPersonName ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="secondaryemail" class="col-md-12">Email Address</label>
                                        <div class="col-md-12">
                                            <input type="email" id="secondaryemail"
                                                class="form-control form-control-line" name="paymentPersonEmail"
                                                value="{{$user->provider->paymentPersonEmail ?? ''}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="secondaryphone" class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <input type="number" id="secondaryphone"
                                                class="form-control form-control-line" name="paymentPersonPhone"
                                                value="{{$user->provider->paymentPersonPhone ?? ''}}" required>
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
                                        If you wish to use our system for payments
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" id="bankForm"
                                    action="{{route('bank.addBank')}}" method="POST">
                                    @php
                                    $active = false;
                                    if($user->stripeAccount){
                                    $active = true;
                                    }
                                    @endphp
                                    @csrf
                                    <div class="form-group">
                                        <label for="bname" class="col-md-12">Bank Name </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="bname"
                                                id="bname" {{$active ? 'disabled' : '' }}
                                                value="{{$user->provider->bankName ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountHolderName" class="col-md-12">Account Holder Name </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line"
                                                name="accountHolderName" id="accountHolderName" {{$active ? 'disabled'
                                                : '' }} value="{{$user->provider->accountHolderName ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="routingNumber" class="col-md-12">Routing Number </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line"
                                                name="routingNumber" id="routingNumber" {{$active ? 'disabled' : '' }}
                                                value="{{$user->provider->routingNumber ?? ''}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="accountNumber" class="col-md-12">Account Number </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line"
                                                name="accountNumber" value="{{$user->provider->accountNumber ?? ''}}"
                                                id="accountNumber" {{$active ? 'disabled' : '' }} />
                                        </div>
                                    </div>
                                    @if ($active && !($user->provider->confirmed))
                                    <div class="alert alert-warning" role="alert">
                                        We will send you two small depsit amounts to your bank account in couple of
                                        working days. Log in to your bank's
                                        website or app and enter the amounts you
                                        see in the fields below.
                                    </div>
                                    <div class="row topspace">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Deposit amount 1</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$.</span>
                                                    <input class="input-lg form-control amount " type="number"
                                                        name="amount1" placeholder="32">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="verify" value="1">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Deposit amount 2</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$.</span>
                                                    <input class="input-lg form-control amount" type="number"
                                                        name="amount2" placeholder="45">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if ($user->stripeAccount)
                                    @if ($user->provider->confirmed)
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" disabled>Bank Account Attached</button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Verify Bank Account</button>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" id="addBank" type="submit">Add
                                                Bank</button>
                                        </div>
                                    </div>
                                    @endif

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
                                                <input type="radio" name="type" id="radio19" value="Hospital"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Hospital')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="radio19"> Hospital </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio18" value="Doctor's Office"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == "Doctor's Office")
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio18"> Doctor's Office </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio37" value="Surgical Center"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Surgical Center')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio37"> Surgical Center </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio36" value="Medical Spa"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Medical Spa')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio36"> Medical Spa </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio36" value="Private Business"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Private Business')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio36"> Private Business </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio35" value="School"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'School')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio35"> School </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio34" value="Urgent Care"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Urgent Care')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio34"> Urgent Care </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" id="radio33" value="Other"
                                                    @if($user->provider)
                                                @if ($user->provider->businessType == 'Other')
                                                checked
                                                @endif
                                                @endif>
                                                <label for="radio33"> Other </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="zip" class="col-md-12">Location Zip Code</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="zip"
                                                id="zip" value="{{$user->provider->zip ?? ""}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Years in Business </label>
                                        <div class="col-md-12">

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio14" value="0-3 years"
                                                    @if($user->provider)
                                                @if ($user->provider->experince == '0-3 years')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="radio14"> 0-3 years </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio15" value="4-10 years"
                                                    @if($user->provider)
                                                @if ($user->provider->experince == '4-10 years')
                                                checked
                                                @endif
                                                @endif/>
                                                <label for="radio16"> 4-10 years </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="experince" id="radio17" value="Over 10 years"
                                                    @if($user->provider)
                                                @if ($user->provider->experince == 'Over 10 years')
                                                checked
                                                @endif
                                                @endif/>
                                                <label for="radio17"> Over 10 years </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Please tell applicants more information about your
                                            business.</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control form-control-line" rows="5"
                                                name="about">{{$user->provider->about ?? ""}}</textarea>
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
        <footer class="footer text-center"> 2021 &copy; Med Connect . <a href="mailto:contact@medconnectus.com">Contact
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
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    var token;
    $(function() {
        $("#addBank").on('click', function(e) {
        e.preventDefault();
        var form = document.getElementById('bankForm');
        var accountholderName = $('#accountHolderName').val();
        var routingNumber = $('#routingNumber').val();
        var accountNumber = $('#accountNumber').val();
        var stripe = Stripe(
            "{{config('services.stripe.publishable')}}"
        );
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

    //   $("#connected").on('click', function(e) {
    //     e.preventDefault();
    //   });
    //   $("#link-button").on('click', function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //       url: "{{route('bank.createToken')}}",
    //       method: "GET",
    //       success: function($response) {
    //         token = $response;
    //         const configs = {
    //           token: token,
    //           onLoad: function() {

    //           },
    //           onSuccess: function(public_token, metadata) {
    //             console.log(metadata.accounts[0].id);
    //             $.ajax({
    //               url: "{{route('bank.verifyToken')}}",
    //               method: "POST",
    //               data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 public_token: public_token,
    //                 account_id: metadata.accounts[0].id
    //               },
    //               success: function($response) {
    //                 console.log($response);
    //                 $("#link-button").text("Bank Linked");
    //                 alert("Your bank account has been linked successfully!");
    //               }
    //             });
    //             console.log('Public Token: ' + public_token);
    //             switch (metadata.accounts.length) {
    //               case 0:
    //                 break;
    //               case 1:
    //                 console.log('Customer-selected account ID: ' + metadata.accounts[0].id);
    //                 break;
    //               default:
    //             }
    //           },
    //           onExit: async function(err, metadata) {
    //             // The user exited the Link flow.
    //             if (err != null) {
    //               console.log(err);
    //             }
    //           },
    //         };
    //         var linkHandler = Plaid.create(configs);
    //         linkHandler.open();

    //       }
    //     });
    //   });

    });
</script>
@endsection