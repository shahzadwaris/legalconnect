@extends('layouts.admin')
@section('title')
Create A Job
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create A Job</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.jobs.index')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> View All Jobs</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Add Job Details Here</h6>
        </div>
        <div class="card-body">

            <form class="form-horizontal form-material" action="{{route('admin.jobs.store')}}" method="POST" />
            @csrf
            <div class="form-group">
                <label for="providers" class="font-weight-bold">Provides</label>
                <select class="form-control py-2" id="providers" name="provider">

                    @foreach ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->username.' ('.
                        $provider->name}})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title" class="font-weight-bold">Job Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title"
                    placeholder="Job Title">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Type of Job</label>
                <div class="radio radio-info">
                    <input type="radio" name="type" id="radio35" value="Per Diem">
                    <label for="radio35"> Per Diem </label>
                </div>

                <div class="radio radio-info">
                    <input type="radio" name="type" id="radio34" value="Full Time">
                    <label for="radio34"> Full Time </label>
                </div>

                <div class="radio radio-info">
                    <input type="radio" name="type" id="radio33" value="Travel">
                    <label for="radio33"> Travel </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="zip" class="font-weight-bold">Location of Job by Zip Code</label>
                    <input type="text" name="zip" placeholder="123456" required class="form-control" id="zip"
                        value="{{old('zip')}}" />
                </div>
                <div class="form-group col-md-4">
                    <label for="length" class="font-weight-bold">Length of Job (if not full time)</label>
                    <input type="text" name="length" class="form-control" id="length" value="{{old('length')}}" />
                </div>
                <div class="form-group col-md-4">
                    <label for="shift" class="font-weight-bold">Shift/Hours</label>
                    <input type="text" name="hours" class="form-control" id="shift" value="{{old('hours')}}" />
                </div>
            </div>
            <div class="form-group">
                <label for="requirements" class="font-weight-bold">Minimum Requirements</label>
                <textarea class="form-control form-control-line" rows="3"
                    name="requirements">{{old('requirements')}}</textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pay" class="font-weight-bold">Pay Range</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="pay" value="{{old('pay')}}" class="form-control" id="pay"
                            aria-label="Amount (to the nearest dollar)">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for=" pay_type">Pay Duration/Type</label>
                    <select class="form-control" name="pay_type" id="pay_type">
                        <option value="">Select</option>
                        <option value="Daily">Daily</option>
                        <option value="Weekly">Weekly</option>
                        <option value="Yearly">Yearly</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="category" class="font-weight-bold">Category</label>
                    <div class="col-md-12">
                        <select name="category" class="form-control" id="category">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->slug}}">{{$category->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="requirements" class="font-weight-bold">More information about Job (optional)</label>
                <textarea class="form-control form-control-line" rows="3" name="more">{{old('more')}}</textarea>
            </div>
            <div class="form-group">
                <label for="requirements" class="font-weight-bold">Specialties Required (please check
                    any that apply)</label>
                @php
                $specialties=[];
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
                    <button type="submit" class="btn btn-primary btn-block mt-5">Create Job</button>
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
@endsection
@section('js')
<script src="{{asset('admin/js/select2.js')}}"></script>
<script>
    $(document).ready(function() {
            $('#providers').select2();
        });
</script>
@endsection