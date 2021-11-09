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

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
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
                                <form class="form-horizontal form-material"
                                    action="{{route('admin.jobs.update',$job->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Job Title</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" name="title"
                                                value="{{$job->jobTitle}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Type of Job </label>
                                        <div class="col-md-12">

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" {{$job->type == 'Per Diem' ? 'checked' :
                                                ''}}
                                                id="radio19"
                                                value="Per Diem">
                                                <label for="radio35"> Per Diem </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" {{$job->type == 'Full Time' ? 'checked'
                                                : ''}}
                                                id="radio34"
                                                value="Full Time">
                                                <label for="radio34"> Full Time </label>
                                            </div>

                                            <div class="radio radio-info">
                                                <input type="radio" name="type" {{$job->type == 'Travel' ? 'checked' :
                                                ''}}
                                                id="radio33"
                                                value="Travel">
                                                <label for="radio33"> Travel </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3" style="margin-top: .3rem;">
                                            <div class="form-group">
                                                <label>Location of Job by Zip Code </label>
                                                {{-- <div class="col-md-12"> --}}
                                                    <input type="text" class="form-control form-control-line" name="zip"
                                                        value="{{$job->zip}}" required>
                                                    {{--
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-4">
                                            <div class="form-group">
                                                <label class="control-label">Length of Job (if not full time)</label>
                                                <input type="text" name="length" class="form-control"
                                                    value="{{$job->jobLength}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-4">
                                            <div class="form-group">
                                                <label class="control-label">Shift/Hours </label>
                                                <input type="text" name="hours" class="form-control"
                                                    value="{{$job->shiftHours}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-12">Minimum Requirements</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control form-control-line" rows="5"
                                                    name="requirements" required>{{$job->requirements}} </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">More information about Job (optional)</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control form-control-line" rows="5"
                                                    name="more">{{$job->about}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Pay Range</label>
                                                    <div class="input-group m-t-10"> <span class="input-group-addon"><i
                                                                class="fa fa-dollar"></i></span>
                                                        <input type="text" id="example-input3-group1"
                                                            style="padding-left: 1rem;" name="pay" class="form-control"
                                                            value="{{$job->salary}}" placeholder="3000-6000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group" style="margin-top: 1.2rem;">
                                                    <label class="col-md-12">Pay Duration/Type</label>
                                                    <div class="col-md-12">
                                                        <select name="pay_type" class="form-control" id="category">
                                                            <option value="">Select</option>
                                                            <option value="Daily" {{$job->pay_type == 'Daily' ?
                                                                'selected' : ''}}>Daily</option>
                                                            <option value="Weekly" {{$job->pay_type == 'Weekly' ?
                                                                'selected' : ''}}>Weekly</option>
                                                            <option value="Yearly" {{$job->pay_type == 'Yearly' ?
                                                                'selected' : ''}}>Yearly</option>

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
                                                            <option value="{{$category->slug}}" {{$category->slug ==
                                                                $job->category ? 'selected' :
                                                                ''}}>{{$category->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Specialties Required (please
                                                check
                                                any that apply)
                                            </label>
                                            @php
                                            $specialties=explode(',',$job->specialties);
                                            @endphp
                                            <div class="col-md-12">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox0" type="checkbox" {{in_array('ER',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="ER">
                                                        <label for="checkbox0"> ER </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox1" type="checkbox" {{in_array('OR',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="OR">
                                                        <label for="checkbox1"> OR </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox2" type="checkbox" {{in_array('ICU',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="ICU">
                                                        <label for="checkbox2"> ICU </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox3" type="checkbox" {{in_array('Pediatric',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Pediatric">
                                                        <label for="checkbox3"> Pediatric </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox4" type="checkbox" {{in_array('Home Health',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Home Health">
                                                        <label for="checkbox4"> Home Health </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox5" type="checkbox" {{in_array('Endoscopy',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Endoscopy">
                                                        <label for="checkbox5"> Endoscopy </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox6" type="checkbox" {{in_array('Lab',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Lab">
                                                        <label for="checkbox6"> Lab </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox7" type="checkbox" {{in_array('IR',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="IR">
                                                        <label for="checkbox7"> IR </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox8" type="checkbox" {{in_array('MS',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="MS">
                                                        <label for="checkbox8"> MS </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox9" type="checkbox" {{in_array('Telehealth',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Telehealth">
                                                        <label for="checkbox9"> Telehealth </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox10" type="checkbox" {{in_array('PACU',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="PACU">
                                                        <label for="checkbox10"> PACU </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox11" type="checkbox" {{in_array('Labor &
                                                            Delivery', $specialties) ? 'checked' : '' }}
                                                            name="specialties[]" value="Labor & Delivery">
                                                        <label for="checkbox11"> Labor & Delivery </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox12" type="checkbox" {{in_array('Long Term
                                                            Care', $specialties) ? 'checked' : '' }}
                                                            name="specialties[]" value="Long Term Care">
                                                        <label for="checkbox12"> Long Term Care </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox13" type="checkbox" {{in_array('Psych
                                                            School', $specialties) ? 'checked' : '' }}
                                                            name="specialties[]" value="Psych School">
                                                        <label for="checkbox13"> Psych School </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox14" type="checkbox" {{in_array('Oncology',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Oncology">
                                                        <label for="checkbox14"> Oncology </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox15" type="checkbox" {{in_array('Geriatric',
                                                            $specialties) ? 'checked' : '' }} name="specialties[]"
                                                            value="Geriatric">
                                                        <label for="checkbox15"> Geriatric </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox16" type="checkbox" {{in_array('Critical
                                                            Care', $specialties) ? 'checked' : '' }}
                                                            name="specialties[]" value="Critical Care">
                                                        <label for="checkbox16"> Critical Care </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox17" type="checkbox" {{in_array('Nurse
                                                            Manager', $specialties) ? 'checked' : '' }}
                                                            name="specialties[]" value="Nurse Manager">
                                                        <label for="checkbox17"> Nurse Manager </label>
                                                    </div>
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
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2021 &copy; Med Connect . <a href="mailto:contact@medconnectus.com">Contact
                Us</a></footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('css')
<link href="{{asset('admin/css/select2.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('admin/js/select2.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#provider').select2();
    });
</script>
@endsection