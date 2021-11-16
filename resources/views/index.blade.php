@extends('layouts.theme')
@section('title')
Welcome
@endsection
@section('css')
<style>
    form.search-box .input-form {
        width: 39.5% !important;
        position: relative;
    }
</style>
@endsection
@section('contents')
<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find The Most Exciting Legal Jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="{{route('home.jobs.search')}}" class="search-box" id="search-form">
                                <div class="input-form">
                                    <input type="text" name="title" placeholder="Job Title or Keyword">
                                </div>
                                <div class="input-form">
                                    <input type="text" name="zip" placeholder="Zip 33334">
                                </div>
                                <div class="search-form">
                                    <a href="#" id="search">Find job</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        {{-- <span>FEATURED TOURS Packages</span> --}}
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach ($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="services-cap">
                            <h5><a href="{{route('home.category.show', $category->slug)}}">{{$category->title}}</a></h5>
                            {{-- <span>(653)</span> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- More Btn -->
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="{{route('home.jobs.index')}}" class="border-btn2">Browse All Sectors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->

    <!-- Online CV Area Start -->
    <div class="online-cv cv-bg section-overly pt-90 pb-120"
        data-background="{{asset('assets/img/gallery/cv_bg.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        {{-- <p class="pera1">FEATURED TOURS Packages</p> --}}
                        <p class="pera2"> Start Looking For Jobs Now!</p>
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"
                            class="border-btn2 border-btn4">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Online CV Area End-->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Recent Job</span>
                        <h2>Featured Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    @if (Auth::check())
                    @foreach ($jobs as $job)
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{route('home.jobs.show', $job->slug)}}"><img
                                        src="{{asset('images/logo-icon.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{route('home.jobs.show', $job->slug)}}">
                                    <h4>{{$job->jobTitle}}</h4>
                                </a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->state ? $job->state->city.' , '.
                                        $job->state->state : ''}}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->zip}}</li>
                                    {{-- <li>${{$job->salary}}</li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="{{route('home.jobs.show', $job->slug)}}">{{$job->type}}</a>
                            <span>{{$job->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @foreach ($jobs as $job)
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{route('login')}}"><img src="{{asset('images/logo-icon.png')}}" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{route('login')}}">
                                    <h4>{{$job->jobTitle}}</h4>
                                </a>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->state ? $job->state->city.' , '.
                                        $job->state->state : ''}}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$job->zip}}</li>
                                    {{-- <li>${{$job->salary}}</li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="{{route('login')}}">{{$job->type}}</a>
                            <span>{{$job->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Featured_job_end -->
    <!-- How  Apply Process Start-->
    <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle white-text text-center">
                        <span>Apply process</span>
                        <h2> How it works</h2>
                    </div>
                </div>
            </div>
            <!-- Apply Process Caption -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-search"></span>
                        </div>
                        <div class="process-cap">
                            <h5>1. Search For A Job</h5>
                            {{-- <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-curriculum-vitae"></span>
                        </div>
                        <div class="process-cap">
                            <h5>2. Apply For A Job</h5>
                            {{-- <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-process text-center mb-30">
                        <div class="process-ion">
                            <span class="flaticon-tour"></span>
                        </div>
                        <div class="process-cap">
                            <h5>3. Get Your Job</h5>
                            {{-- <p>Sorem spsum dolor sit amsectetur adipisclit, seddo eiusmod tempor incididunt ut
                                laborea.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How  Apply Process End-->
    {{--
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <!-- Testimonial contents -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-10">
                    <div class="h1-testimonial-active dot-style">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                        responsibility! So start caring for your body and it will care for you. Eat
                                        clean it will care for you and workout hard.”</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                        responsibility! So start caring for your body and it will care for you. Eat
                                        clean it will care for you and workout hard.”</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder  ">
                                    <div class="founder-img mb-30">
                                        <img src="assets/img/testmonial/testimonial-founder.png" alt="">
                                        <span>Margaret Lawson</span>
                                        <p>Creative Director</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>“I am at an age where I just want to be fit and healthy our bodies are our
                                        responsibility! So start caring for your body and it will care for you. Eat
                                        clean it will care for you and workout hard.”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End --> --}}

    <!-- Support Company Start-->
    <div class="support-company-area support-padding fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>What we are doing?</span>
                            <h2> We have placed thousands of professionsals in jobs.</h2>
                        </div>
                        <div class="support-caption">
                            <p class="pera-top">Sign up now to be a part of the next wave of medical staffing. We
                                connect industry professionals with medical providers to give to simplify the hiring
                                process. Please click below to see how it works.</p>
                            <a href="{{route('home.about')}}" class="btn post-btn">How It Works</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img">
                        <img src="assets/img/service/support-img.jpg" alt="">
                        {{-- <div class="support-img-cap text-center">
                            <p>Since</p>
                            <span>1994</span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Company End-->
    {{--
    <!-- Blog Area Start -->
    <div class="home-blog-area blog-h-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Our latest blog</span>
                        <h2>Our recent news</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/blog/home-blog1.jpg" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>| Properties</p>
                                <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                                </h3>
                                <a href="#" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="assets/img/blog/home-blog2.jpg" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>24</span>
                                    <p>Now</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>| Properties</p>
                                <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                                </h3>
                                <a href="#" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End --> --}}

</main>
@endsection
@section('js')
<script>
    $(function(){
        $("#search").on('click', function(e){
            e.preventDefault();
            $('#search-form').submit();
        })
    });
</script>
@endsection