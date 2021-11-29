@extends('layouts.theme')
@section('title')
{{$job->jobTitle}}
@endsection
@section('contents')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="{{asset('assets/img/hero/about.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{$job->jobTitle}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{asset('images/logo-icon.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{$job->jobTitle}}</h4>
                                </a>
                                <ul>
                                    <li>{{$job->provider->name}}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->zip}}</li>
                                    {{-- <li>{{$job->salary}}</li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{$job->about}}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            {{$job->requirements}}
                        </div>
                        @if ($job->specialties)
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Experience</h4>
                            </div>
                            <ul>
                                @php
                                $specialties = explode(',', $job->specialties);
                                @endphp
                                @foreach ($specialties as $item)
                                <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span>{{$job->created_at->format('M d, Y')}}</span></li>
                            <li>Location : <span>{{$job->state ? $job->state->city.' , '. $job->state->state :
                                    ''}}</span></li>
                            <li>Job nature : <span>{{$job->type}}</span></li>
                            <li>Job Duration : <span>{{$job->jobLength}}</span></li>
                            <li>Job Shift Hours : <span>{{$job->shiftHours}}</span></li>
                            {{-- <li>Salary : <span>${{$job->salary}}</span></li> --}}
                            <li>Application date : <span>{{date('M d, Y')}}</span></li>
                        </ul>

                        <div class="apply-btn2">
                            @php
                            if(Auth::check() && Auth::user()->type == 1){
                            $route = route('apply.store', ['jobID' => $job->id, 'providerID' => $job->user_id]);
                            if($job->applied){
                            echo'<a href="#" class="btn disabled">Applied</a>';
                            }else{

                            echo '<a href="'.$route.'" class="btn">Apply Now</a>';
                            }
                            }else{
                            $route = '';
                            echo '<a href="'.route('register.nurse').'" class="btn">Apply Now</a>';
                            }
                            @endphp
                            {{-- <a
                                href="{{Auth::check() && Auth::user()->type == 1 ? route('apply.store', ['jobID' => $job->id, 'providerID' => $job->user_id]) : route('register.nurse')}}"
                                class="btn">Apply Now</a> --}}
                        </div>
                    </div>
                    @if(Auth::check() && Auth::user()->type == 3){
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span>{{$job->provider->name}}</span>
                        <p>{{$job->provider->about}}.</p>
                        {{-- <ul>
                            <li>Name: <span>Colorlib </span></li>
                            <li>Web : <span> colorlib.com</span></li>
                            <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                        </ul> --}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection