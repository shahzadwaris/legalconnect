@extends('admin.layouts.admin')
@section('contents')
<div id="wrapper">
    <!-- Navigation -->
    @include('admin.partials.sidebar')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Edit Profile ({{$user->name}})</h4>
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
                                        These information will be kept private and not be shared with anyone. Medical
                                        Providers will
                                        identify you by user name.
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material"
                                    action="{{route('admin.nurse.update', $user->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Full Legal Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{$user->name ?? old('name')}}"
                                                class="form-control form-control-line" name="name" required>
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
                                            <input type="email" class="form-control form-control-line" name="email"
                                                id="email" value="{{$user->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" name="dob" value="{{$user->nurse->dob ?? ''}}"
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
                                            <input type="text" value="{{$user->nurse->address ?? ""}}"
                                                class="form-control form-control-line" name="address" value="" required>
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
                                                    $user->nurse->category_id ? 'Selected' : ''}}>{{$category->title}}
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
                                        <label for="example-email" class="col-md-12">Do you currently have liability
                                            insurance?</label>
                                        <div class="col-md-12">
                                            <div class="radio radio-info">
                                                <input type="radio" name="insurance" id="yes" value="Yes"
                                                    @if($user->nurse)
                                                @if ($user->nurse->insurance == 'Yes')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="yes"> Yes </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="insurance" id="no" value="No"
                                                    @if($user->nurse)
                                                @if ($user->nurse->insurance == 'No')
                                                checked
                                                @endif
                                                @endif />
                                                <label for="no"> No </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Update</button>
                                            <a class="btn btn-warning" href="{{route('changePassword.index')}}">Change
                                                Password</a>
                                            <a class="btn btn-danger" href="{{route('nurse.deleteProfile')}}">Delete
                                                Profile</a>
                                        </div>
                                    </div> --}}

                                    {{--
                                </form> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            {{--
            <!-- .row -->
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="active tab"><a href="#settings" data-toggle="tab"> <span class="visible-xs"><i
                                            class="fa fa-user"></i></span> <span>
                                        The following information will be required when you accept your first job in
                                        order
                                        to get paid
                                    </span> </a> </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal form-material" action="{{route('nurse.addBank')}}"
                                    method="POST" enctype="multipart/form-data" id="bankForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ahfn" class="col-md-12">Account Holder First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="firstName"
                                                id="ahfn" value="{{$user->nurse->accountHolderFirstName ?? ''}}">
                                        </div>
                                        @error('firstName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="ahln" class="col-md-12">Account Holder Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="lastName"
                                                id="ahln" value="{{$user->nurse->accountHolderLastName ?? ''}}">
                                        </div>
                                        @error('lastName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-md-12">Phone</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="phone"
                                                id="phone" value="{{$user->nurse->phone ?? ''}}">
                                        </div>
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-md-12">Gender</label>
                                        <div class="col-md-12">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="female" @if ($user->nurse)
                                                    @if($user->nurse->gender == 'female')
                                                    checked
                                                    @endif
                                                    @endif>Female
                                                </option>
                                                <option value="male" @if ($user->nurse)
                                                    @if($user->nurse->gender == 'male')
                                                    checked
                                                    @endif
                                                    @endif>Male
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ssn" class="col-md-12">Social Security Number</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="ssn"
                                                id="ssn" value="{{$user->nurse->socialSecurityNumber ?? ''}}">
                                        </div>
                                        @error('ssn')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bankName" class="col-md-12">Bank Name </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="bname"
                                                id="bankName" value="{{$user->nurse->bankName ?? ''}}">
                                        </div>
                                        @error('bankName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="routingNumber" class="col-md-12">Routing Number </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="rnumber"
                                                id="routingNumber" value="{{$user->nurse->rountingNumber ?? ''}}">
                                        </div>
                                        @error('rnumber')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="accountNumber" class="col-md-12">Account Number </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="anumber"
                                                id="accountNumber" value="{{$user->nurse->accountNumber ?? ''}}">
                                        </div>
                                        @error('anumber')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Upload Copy of RN Card
                                            Certification</label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line"
                                                name="certification" id="example-email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Upload Proof of BLS Certification
                                        </label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="bls"
                                                id="example-email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Upload Valid Driver's license or
                                            Passport</label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="passport"
                                                id="example-email">
                                        </div>
                                    </div>
                                    <div class="error"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" id='addBankInfo'>Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row --> --}}

            <!-- .row -->
            {{-- <div class="row"> --}}

                {{-- <form class="form-horizontal form-material"
                    action="{{route('nurse.updateMedicalProviderDetails')}}" method="POST">
                    @csrf --}}
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
                                value="{{$user->nurse->zip ?? ""}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="salary" class="col-md-12">Preferred Pay/Salary</label>
                        <div class="col-md-12">
                            <div class="input-group m-t-10"> <span class="input-group-addon"><i
                                        class="fa fa-dollar"></i></span>
                                <input type="text" id="salary" name="salary" value="{{$user->nurse->salary ?? ""}}"
                                    class="form-control">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Willing to travel? </label>
                        <div class="col-md-12">

                            <div class="radio radio-info">
                                <input type="radio" name="travel" id="travel" value="1" @if($user->nurse)
                                @if ($user->nurse->travel == 1)
                                checked
                                @endif
                                @endif />
                                <label for="travel"> YES </label>
                            </div>

                            <div class="radio radio-info">
                                <input type="radio" name="travel" id="travel-mo" value="0" @if($user->nurse)
                                @if ($user->nurse->travel == 0)
                                checked
                                @endif
                                @endif>
                                <label for="travel-mo"> NO </label>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Years of Experience </label>
                        <div class="col-md-12">

                            <div class="radio radio-info">
                                <input type="radio" name="years" id="lessthenyear" value="1" @if($user->nurse)
                                @if ($user->nurse->experienceInYears == 1)
                                checked
                                @endif
                                @endif>
                                <label for="lessthenyear"> Less than 1 Year </label>
                            </div>

                            <div class="radio radio-info">
                                <input type="radio" name="years" id="24years" value="2" @if($user->nurse)
                                @if ($user->nurse->experienceInYears == 2)
                                checked
                                @endif
                                @endif
                                >
                                <label for="24years"> 2-4 Years </label>
                            </div>

                            <div class="radio radio-info">
                                <input type="radio" name="years" id="59years" value="3" @if($user->nurse)
                                @if ($user->nurse->experienceInYears == 3)
                                checked
                                @endif
                                @endif
                                >
                                <label for="59years"> 5-9 years </label>
                            </div>

                            <div class="radio radio-info">
                                <input type="radio" name="years" id="10years" value="4" @if($user->nurse)
                                @if($user->nurse->experienceInYears == 4)
                                checked
                                @endif
                                @endif
                                >
                                <label for="10years"> 10 or more years </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Please Check the following
                            experience
                            you have?
                        </label>
                        @php
                        $experiences = [];
                        if($user->nurse)
                        {
                        $experiences = explode(',', $user->nurse->experiences);
                        }

                        @endphp
                        <div class="col-md-12">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox0" type="checkbox" {{in_array('ER', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="ER">
                                    <label for="checkbox0"> ER </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox1" type="checkbox" {{in_array('OR', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="OR">
                                    <label for="checkbox1"> OR </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox2" type="checkbox" {{in_array('ICU', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="ICU">
                                    <label for="checkbox2"> ICU </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox3" type="checkbox" {{in_array('Pediatric', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Pediatric">
                                    <label for="checkbox3"> Pediatric </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox4" type="checkbox" {{in_array('Home Health', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Home Health">
                                    <label for="checkbox4"> Home Health </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox5" type="checkbox" {{in_array('Endoscopy', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Endoscopy">
                                    <label for="checkbox5"> Endoscopy </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox6" type="checkbox" {{in_array('Lab', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="Lab">
                                    <label for="checkbox6"> Lab </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox7" type="checkbox" {{in_array('IR', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="IR">
                                    <label for="checkbox7"> IR </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox8" type="checkbox" {{in_array('MS', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="MS">
                                    <label for="checkbox8"> MS </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox9" type="checkbox" {{in_array('Telehealth', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Telehealth">
                                    <label for="checkbox9"> Telehealth </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox10" type="checkbox" {{in_array('PACU', $experiences) ? 'checked'
                                        : '' }} name="experiences[]" value="PACU">
                                    <label for="checkbox10"> PACU </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox11" type="checkbox" {{in_array('Labor & Delivery', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Labor & Delivery">
                                    <label for="checkbox11"> Labor & Delivery </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox12" type="checkbox" {{in_array('Long Term Care', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Long Term Care">
                                    <label for="checkbox12"> Long Term Care </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox13" type="checkbox" {{in_array('Psych School', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Psych School">
                                    <label for="checkbox13"> Psych School </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox14" type="checkbox" {{in_array('Oncology', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Oncology">
                                    <label for="checkbox14"> Oncology </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox15" type="checkbox" {{in_array('Geriatric', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Geriatric">
                                    <label for="checkbox15"> Geriatric </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox16" type="checkbox" {{in_array('Critical Care', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Critical Care">
                                    <label for="checkbox16"> Critical Care </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="checkbox checkbox-info">
                                    <input id="checkbox17" type="checkbox" {{in_array('Nurse Manager', $experiences)
                                        ? 'checked' : '' }} name="experiences[]" value="Nurse Manager">
                                    <label for="checkbox17"> Nurse Manager </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Please list any other proficiencies or skills you would
                            like a Medical
                            Provider to know about.</label>
                        <div class="col-md-12">
                            <textarea class="form-control form-control-line" rows="5"
                                name="about">{{$user->nurse->about ?? ''}}</textarea>
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
@endsection