@extends('layouts.admin')
@section('title')
Edit Law Firm
@endsection
@section('contents')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile Of {{$user->username}}</h1>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.providers.index')}}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-eye fa-sm text-white-50"></i> View All Law Firms</a>
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Law Firm Details Here</h6>
        </div>
        <div class="card-body">

            <form class="form-horizontal form-material" action="{{route('admin.provider.update', $user->id)}}"
                method="POST" />
            @csrf
            <div class="form-group">
                <label for="businessName" class="font-weight-bold">Name of Business</label>
                <input type="text" class="form-control" name="businessName" value="{{$user->name ?? ''}}"
                    id="businessName" required>
            </div>
            <div class="form-group">
                <label for="HiringPerson" class="font-weight-bold">Name of Person for Hiring</label>
                <input type="text" class="form-control" name="hiringPerson" value="{{$user->firm->hiringPerson ?? ''}}"
                    id="HiringPerson" required>
            </div>
            <div class="form-group">
                <label for="primaryemail" class="font-weight-bold">Email Address (Hiring
                    Person)</label>
                <input type="text" class="form-control" name="hiringPersonEmail" value="{{$user->email ?? ''}}" readonly
                    id="primaryemail" required>
            </div>
            <div class="form-group">
                <label for="primaryphone" class="font-weight-bold">Phone Number (Hiring
                    Person)</label>
                <input type="text" class="form-control" name="hiringPersonPhone"
                    value="{{$user->firm->hiringPersonPhone ?? ''}}" id="primaryphone" />
            </div>
            <h5>Contact information for Payments</h5>
            <div class="form-group">
                <label for="secondaryname" class="font-weight-bold">Name of Person for Hiring</label>
                <input type="text" class="form-control" name="paymentPersonName"
                    value="{{$user->firm->paymentPersonName ?? ''}}" id="secondaryname" required>
            </div>
            <div class="form-group">
                <label for="secondaryemail" class="font-weight-bold">Email Address (Hiring
                    Person)</label>
                <input type="text" class="form-control" name="paymentPersonEmail"
                    value="{{$user->firm->paymentPersonEmail ?? ''}}" id="secondaryemail" required>
            </div>
            <div class="form-group">
                <label for="secondaryphone" class="font-weight-bold">Phone Number (Hiring
                    Person)</label>
                <input type="text" class="form-control" name="paymentPersonPhone"
                    value="{{$user->firm->paymentPersonPhone ?? ''}}" id=" secondaryphone" />
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Type of
                    Business</label>
                <div class="radio radio-info">
                    <input type="radio" name="type" id="radio35" value="Law Firm" @if($user->firm)
                    @if ($user->firm->businessType ==
                    'Law Firm')
                    checked
                    @endif
                    @endif>
                    <label for="radio35"> Law Firm </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="type" id="radio35" value="Other" @if($user->firm)
                    @if ($user->firm->businessType ==
                    'Other')
                    checked
                    @endif
                    @endif>
                    <label for="radio35"> Other </label>
                </div>
            </div>
            <div class="form-group">
                <label for="zip" class="font-weight-bold">Location Zip Code</label>
                <input type="text" name="zip" placeholder="123456" required class="form-control" id="zip"
                    value="{{$user->firm->zip ?? ""}}" />
            </div>
            <div class="form-group">
                <label for="employees" class="font-weight-bold">How many Attorneys do you
                    employ?</label>
                <input type="text" class="form-control" name="employees" id="employees"
                    value="{{$user->firm->employees ?? ""}}" required>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Years in Business</label>
                <div class="radio radio-info">
                    <input type="radio" name="experince" id="radio43" value="0-3 years" @if($user->firm)
                    @if ($user->firm->experince == '0-3 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio43"> 0-3 years </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="experince" id="radio44" value="4-10 years" @if($user->firm)
                    @if ($user->firm->experince == '4-10 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio44"> 4-10 years </label>
                </div>
                <div class="radio radio-info">
                    <input type="radio" name="experince" id="radio45" value="Over 10 years" @if($user->firm)
                    @if ($user->firm->experince == 'Over 10 years')
                    checked
                    @endif
                    @endif />
                    <label for="radio45"> Over 10 years </label>
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="font-weight-bold">What areas does your Law Firm
                    specialize in?
                </label>
                @php
                $experiences = [];
                if($user->firm)
                {
                $experiences = explode(',', $user->firm->specialize);
                }

                @endphp
                <div class="row">
                    {{-- <div class="col-md-12"> --}}
                        @foreach ($categories as $item)
                        <div class="col-lg-4">
                            <div class="checkbox checkbox-info">
                                <input id="{{$item->title}}" type="checkbox" {{in_array($item->title, $experiences) ?
                                'checked'
                                : '' }} name="experiences[]" value="{{$item->title}}">
                                <label for="{{$item->title}}"> {{$item->title}} </label>
                            </div>
                        </div>
                        @endforeach
                        {{--
                    </div> --}}
                </div>
            </div>
            <div class="form-group">
                <label for="businessName" class="font-weight-bold">About Business</label>
                <textarea class="form-control form-control-line" rows="5"
                    name="about">{{$user->firm->about ?? ""}}</textarea>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary btn-block mt-5">Update Provider</button>
                </div>
                <div class="col-md-2"></div>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection