@extends('layouts.theme')
@section('title')
Find Jobs
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
                            <h2>Find your job</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- Job List Area Start -->
    <div class="job-listing-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <!-- Left content -->
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Job Category Listing start -->
                    <form action="{{route('home.jobs.index')}}" method="get" id="filterForm">
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Title</h4>
                                </div>
                                <div class="input-form select-job-items2">
                                    <input type="text" value="{{request()->get('title') ?? ''}}" class="form-control"
                                        name="title" placeholder="Job Title or keyword" tabindex="0">
                                </div>
                                <div class="small-section-tittle2 mt-5">
                                    <h4>Job Category</h4>
                                </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="category">
                                        <option value="">All Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->slug}}" @if (isset($filters['category']))
                                            @if($filters['category']==$category->slug)
                                            selected
                                            @endif @endif>{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <label class="container">All
                                        <input type="checkbox" id="all" value="all" name="type[]" @if ($filters &&
                                            isset($filters['type'])) @if (in_array('all', $filters['type'])) checked
                                            @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Per Diem
                                        <input type="checkbox" value="Per Diem" name="type[]" @if ($filters &&
                                            isset($filters['type'])) @if (in_array('Per Diem', $filters['type']))
                                            checked @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Full Time
                                        <input type="checkbox" name="type[]" value="Full Time" @if ($filters &&
                                            isset($filters['type'])) @if (in_array('Full Time', $filters['type']))
                                            checked @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Travel
                                        <input type="checkbox" name="type[]" value="Travel" @if ($filters &&
                                            isset($filters['type'])) @if (in_array('Travel', $filters['type'])) checked
                                            @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                                <div class="small-section-tittle2">
                                    <h4>Job Location</h4>
                                </div>
                                <div class="input-form select-job-items2 mb-3">
                                    <input type="text" value="{{request()->get('zip') ?? ''}}" class="form-control"
                                        name="zip" placeholder="Zipcode" tabindex="0">
                                </div>
                                <div class="small-section-tittle2">
                                    <h4>Radius</h4>
                                </div>
                                <div class="select-job-items2">

                                    <select name="distance">
                                        <option value="10" @if ($filters && isset($filters['distance']))
                                            @if($filters['distance']==10) selected @endif @endif>10 Miles
                                        </option>
                                        <option value="25" @if ($filters && isset($filters['distance']))
                                            @if($filters['distance']==25) selected @endif @endif>25 Miles</option>
                                        <option value="50" @if ($filters && isset($filters['distance']))
                                            @if($filters['distance']==50) selected @endif @endif>50 Miles</option>
                                        <option value="100" @if ($filters && isset($filters['distance']))
                                            @if($filters['distance']==100) selected @endif @endif>100 Miles</option>
                                    </select>
                                </div>
                            </div>
                            <!-- single three -->
                            <div class="single-listing pt-80">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox" value="any" @if($filters && isset($filters['date']))
                                            @if(in_array('any', $filters['date'])) checked @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox" value="today" name="date[]" @if($filters &&
                                            isset($filters['date'])) @if(in_array('today', $filters['date'])) checked
                                            @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">This Week
                                        <input type="checkbox" value="week" name="date[]" @if($filters &&
                                            isset($filters['date'])) @if(in_array('week', $filters['date'])) checked
                                            @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">This Month
                                        <input type="checkbox" value="month" name="date[]" @if($filters &&
                                            isset($filters['date'])) @if(in_array('any', $filters['date'])) checked
                                            @endif @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <div class="single-listing pt-10">
                                <a href="#" class="btn head-btn1" id="apply">Apply Filters</a>
                                @if ($filters)
                                <a href="{{route('home.jobs.index')}}" class="btn head-btn2 mt-3" id="clear-all">Clear
                                    Filter</a>
                                @endif
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </form>
                </div>
                <!-- Right content -->
                <div class="col-xl-9 col-lg-9 col-md-8">
                    <!-- Featured_job_start -->
                    <section class="featured-job-area">
                        <div class="container">
                            <!-- Count of Job list Start -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="count-job mb-35">
                                        <span>{{$jobs->total()}} Jobs found</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Count of Job list End -->
                            @if (Auth::check())
                            @foreach ($jobs as $job)
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{route('home.jobs.show', $job->slug)}}"><img
                                                src="{{asset('images/logo-icon.png')}}" alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="{{route('home.jobs.show', $job->slug)}}">
                                            <h4 style='width:80%'>{{$job->jobTitle}}</h4>
                                        </a>
                                        <ul>
                                            <li>{{$job->state ? $job->state->city.' , '. $job->state->state : ''}}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{$job->zip}}</li>
                                            {{-- <li>{{$job->salary == 'TBD' ? $job->salary : '$'.$job->salary. '
                                                / '.$job->pay_type}}</li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="{{route('home.jobs.show', $job->slug)}}">Full Time</a>
                                    <span>{{$job->created_at->diffforhumans()}}</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            @endforeach
                            @else
                            @foreach ($jobs as $job)
                            <!-- single-job-content -->
                            <div class="single-job-items mb-30">
                                <div class="job-items">
                                    <div class="company-img">
                                        <a href="{{route('login')}}"><img src="{{asset('images/logo-icon.png')}}"
                                                alt=""></a>
                                    </div>
                                    <div class="job-tittle job-tittle2">
                                        <a href="{{route('login')}}">
                                            <h4 style='width:80%'>{{$job->jobTitle}}</h4>
                                        </a>
                                        <ul>
                                            <li>{{$job->state ? $job->state->city.' , '. $job->state->state : ''}}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{$job->zip}}</li>
                                            {{-- <li>{{$job->salary == 'TBD' ? $job->salary : '$'.$job->salary. '
                                                / '.$job->pay_type}}</li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="items-link items-link2 f-right">
                                    <a href="{{route('login')}}">Full Time</a>
                                    <span>{{$job->created_at->diffforhumans()}}</span>
                                </div>
                            </div>
                            <!-- single-job-content -->
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <!-- Featured_job_end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Job List Area End -->
    @if ($jobs->hasPages())

    <!--Pagination Start  -->
    <div class="pagination-area pb-115 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            {{-- <ul class="pagination justify-content-start">
                                @if ($paginator->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                @else
                                <li class="page-item"><a class="page-link"
                                        href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
                                @endif
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span
                                            class="ti-angle-right"></span></a>
                                </li>
                            </ul> --}}
                            {!! $jobs->appends($filters)->render("pagination::bootstrap-4") !!}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Pagination End  -->
    @endif
</main>
@endsection
@section('css')
<link href="{{asset('admin/css/select2.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('admin/js/select2.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $("#apply").on('click', function(e){
            e.preventDefault();
            $("#filterForm").submit();
        });
        $('#all').on('click', function(e){
            if(!$(this).is(':checked')){
                $('input[name="type[]"]').removeAttr('checked').removeClass('checkmark');
                return;
            }
            $('input[name="type[]"]').trigger('click');
        });
        // $('input[name="type[]"]').on('click', function(e){
        //     if(!$(this).is(':checked')){
        //         $(this).removeAttr('checked');
        //     }
        // })
        
    });
</script>
@endsection