@extends('layouts.theme')
@section('title')
Terms & Conditions Legal Woker
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
                            <h2>Terms & Conditions for Legal Worker</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-20 pb-120">
        <div class="container">
            {{-- <div class="section-top-border"> --}}
                <div class="row">
                    <div class="col-12">
                        {!! $page->contents !!}
                    </div>
                </div>
                {{--
            </div> --}}
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection