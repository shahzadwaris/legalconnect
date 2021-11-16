@extends('layouts.admin')
@section('title')
Edit Legal Worker ({{$user->username}})
@endsection
@section('contents')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Medical Worker ({{$user->username}})</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.nurses.index')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> View All Legal Workers</a>
            </div>
        </div>
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Legal Worker Details Here</h6>
        </div>
        <div class="card-body">

            <form class="form-horizontal form-material" action="{{route('admin.nurse.update', $user->id)}}"
                method="POST" />
            @csrf
            <div class="form-group">
                <label for="title" class="font-weight-bold">Full Legal Name</label>
                <input type="text" value="{{$user->name ?? old('name')}}" class="form-control" name="name" required>
                @error('name')
                <span class="text-danger">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" readonly>
            </div>
            <div class="form-group">
                <label for="dob" class="font-weight-bold">Date Of Birth</label>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" id="dob" name="dob" value="{{$user->worker->dob ?? ''}}"
                        class="form-control pl-2">
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
            <div class="form-group">
                <label for="address" class="font-weight-bold">Home Address</label>
                <input type="text" value="{{$user->worker->address ?? ""}}" id="address" class="form-control"
                    name="address" value="" required>
                @error('address')
                <span class="text-danger">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Profession</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id ==
                        $user->worker->category_id ? 'Selected' : ''}}>{{$category->title}}
                    </option>
                    @endforeach
                </select>
                @error('address')
                <span class="text-danger">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Do you currently have liability
                    insurance?</label>
                <div class="radio radio-info">
                    <input type="radio" name="insurance" id="yes" value="Yes" {@if($user->worker)
                    @if ($user->worker->insurance == 'Yes')
                    checked
                    @endif
                    @endif/>
                    <label for="yes"> Yes </label>
                </div>

                <div class="radio radio-info">
                    <input type="radio" name="insurance" id="no" value="No" @if($user->worker)
                    @if ($user->worker->insurance == 'No')
                    checked
                    @endif
                    @endif />
                    <label for="no"> No </label>
                </div>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Username</label>
                <input type="text" class="form-control" name="username" value="{{$user->username}}" readonly>
            </div>
            <div class="form-group">
                <label for="zip" class="font-weight-bold">Location Zip Code</label>
                <input type="text" name="zip" placeholder="123456" required class="form-control" id="zip"
                    value="{{$user->worker->zip ?? ""}}" />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Willing to travel??</label>
                <div class="radio radio-info">
                    <input type="radio" name="travel1" id="travel" value="1" @if($user->worker)
                    @if ($user->worker->travel == 1)
                    checked
                    @endif
                    @endif/>
                    <label for="travel1"> Yes </label>
                </div>

                <div class="radio radio-info">
                    <input type="radio" name="travel0" id="travel" value="0" @if($user->worker)
                    @if ($user->worker->travel == 0)
                    checked
                    @endif
                    @endif/>
                    <label for="trave0l"> No </label>
                </div>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Years in Business</label>
                <div class="radio radio-info">
                    <input type="radio" name="years" id="radio50" value="0-3 years" @if($user->worker)
                    @if ($user->worker->experienceInYears == '0-3 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio50"> 4-10 years </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="years" id="radio44" value="4-10 years" @if($user->worker)
                    @if ($user->worker->experienceInYears == '4-10 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio44"> 4-10 years </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="years" id="radio45" value="Over 10 years" @if($user->worker)
                    @if ($user->worker->experienceInYears == 'Over 10 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio45"> Over 10 years </label>
                </div>
            </div>


            <div class="form-group">
                <label for="requirements" class="font-weight-bold">Please Check the following
                    experience
                    you have?</label>
                @php
                $specialties = [];
                if($user->worker)
                {
                $specialties = explode(',', $user->worker->experiences);
                }

                @endphp
                <div class="row">
                    <div class="col-md-4">
                        <div class="checkbox checkbox-info">
                            <input id="checkbox0" type="checkbox" {{in_array('ER', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="ER">
                            <label for="checkbox0"> ER </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox1" type="checkbox" {{in_array('OR', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="OR">
                            <label for="checkbox1"> OR </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox2" type="checkbox" {{in_array('ICU', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="ICU">
                            <label for="checkbox2"> ICU </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox3" type="checkbox" {{in_array('Pediatric', $specialties) ? 'checked' : ''
                                }} name="specialties[]" value="Pediatric">
                            <label for="checkbox3"> Pediatric </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox4" type="checkbox" {{in_array('Home Health', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Home Health">
                            <label for="checkbox4"> Home Health </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox5" type="checkbox" {{in_array('Endoscopy', $specialties) ? 'checked' : ''
                                }} name="specialties[]" value="Endoscopy">
                            <label for="checkbox5"> Endoscopy </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox checkbox-info">
                            <input id="checkbox6" type="checkbox" {{in_array('Lab', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="Lab">
                            <label for="checkbox6"> Lab </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox7" type="checkbox" {{in_array('IR', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="IR">
                            <label for="checkbox7"> IR </label>
                        </div>


                        <div class="checkbox checkbox-info">
                            <input id="checkbox8" type="checkbox" {{in_array('MS', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="MS">
                            <label for="checkbox8"> MS </label>
                        </div>


                        <div class="checkbox checkbox-info">
                            <input id="checkbox9" type="checkbox" {{in_array('Telehealth', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Telehealth">
                            <label for="checkbox9"> Telehealth </label>
                        </div>


                        <div class="checkbox checkbox-info">
                            <input id="checkbox10" type="checkbox" {{in_array('PACU', $specialties) ? 'checked' : '' }}
                                name="specialties[]" value="PACU">
                            <label for="checkbox10"> PACU </label>
                        </div>


                        <div class="checkbox checkbox-info">
                            <input id="checkbox11" type="checkbox" {{in_array('Labor & Delivery', $specialties)
                                ? 'checked' : '' }} name="specialties[]" value="Labor & Delivery">
                            <label for="checkbox11"> Labor & Delivery </label>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="checkbox checkbox-info">
                            <input id="checkbox12" type="checkbox" {{in_array('Long Term Care', $specialties)
                                ? 'checked' : '' }} name="specialties[]" value="Long Term Care">
                            <label for="checkbox12"> Long Term Care </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox13" type="checkbox" {{in_array('Psych School', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Psych School">
                            <label for="checkbox13"> Psych School </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox14" type="checkbox" {{in_array('Oncology', $specialties) ? 'checked' : ''
                                }} name="specialties[]" value="Oncology">
                            <label for="checkbox14"> Oncology </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox15" type="checkbox" {{in_array('Geriatric', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Geriatric">
                            <label for="checkbox15"> Geriatric </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox16" type="checkbox" {{in_array('Critical Care', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Critical Care">
                            <label for="checkbox16"> Critical Care </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox17" type="checkbox" {{in_array('Nurse Manager', $specialties) ? 'checked'
                                : '' }} name="specialties[]" value="Nurse Manager">
                            <label for="checkbox17"> Nurse Manager </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block mt-5">Update Infomation</button>
                </div>
                <div class="col-md-2"></div>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection
@section('css')
<link href="{{asset('admin/css/select2.css')}}" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
<script src="{{asset('admin/js/select2.js')}}"></script>
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
<script>
    $(document).ready(function() {
            $('#providers').select2();
        });
</script>

@endsection