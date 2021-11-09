@extends('layouts.theme')
@section('title')
Frequently Asked Questions
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
                            <h2>Frequently Asked Questions</h2>
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
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            How do I sign up?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        Please click register at the top of the homepage, choose your profession,
                                        and follow the instructions to create your
                                        profile.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading2">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#2"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Why do I choose Med Connect over other staffing companies?
                                        </button>
                                    </h5>
                                </div>
                                <div id="2" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        At Med Connect our business model allows for workers to make more money. We
                                        make the
                                        entire
                                        process easier for workers to find a job and get paid.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#3"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Is there any cost to sign up for anyone?
                                        </button>
                                    </h5>
                                </div>
                                <div id="3" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        No! Signing up is absolutely free! There is never any cost to any workers.
                                        For Medical providers the only cost will be
                                        if you hire a worker.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#4"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            How often are new jobs posted?
                                        </button>
                                    </h5>
                                </div>
                                <div id="4" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Everyday!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#5"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Can I get notified of new jobs posted in my location?
                                        </button>
                                    </h5>
                                </div>
                                <div id="5" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes, simply go to your profile and turn on email notifications and enter the
                                        zip codes where you would like to receive
                                        notifications.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#7"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            In what locations are jobs posted?
                                        </button>
                                    </h5>
                                </div>
                                <div id="7" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Our job searches span across the entire United States
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#8"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Can I look for a job in a different place than where I live?
                                        </button>
                                    </h5>
                                </div>
                                <div id="8" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes, our Medical Providers offer many travel and full time jobs that anyone
                                        can apply for.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#9"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            If I am having trouble setting up my account will you help me?
                                        </button>
                                    </h5>
                                </div>
                                <div id="9" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes! We are here to help you set up your profile and answer any questions
                                        you have!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#10"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            If I am a Medical Provider can you help me post the jobs and manage my
                                            account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="10" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes! We have dedicated Job Connectors that will help build your profile,
                                        post new jobs for you, and manage your account,
                                        and payments. Please contact us to speak with a Connector.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#11"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            As a Worker how do I get paid?
                                        </button>
                                    </h5>
                                </div>
                                <div id="11" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        If Med Connect is paying you, simply put in your checking account
                                        information in your profile and when it is time for
                                        you to get paid we pay you! If you are working full time with the Medical
                                        Provider and they are paying you then that
                                        would be up to them.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#12"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            As a Medical Provider, what is the cost if I hire a worker?
                                        </button>
                                    </h5>
                                </div>
                                <div id="12" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        It depends, but if everything is done on the website payments to Med Connect
                                        start as low as $20 an hour (added to the
                                        worker’s pay) or we charge a flat fee of $6,000. For more details please
                                        read out terms and conditions. We also have
                                        customizable payment structures and contracts available to institutions
                                        where we assist with the work. Please contact us
                                        for more details.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#13"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            As a Medical Provider how do I Pay Med Connect?
                                        </button>
                                    </h5>
                                </div>
                                <div id="13" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        All payments can be done through the website. You can pay right out of your
                                        checking account. We also have options to
                                        send you an invoice and you can pay there with your checking account or
                                        debit card, or you can set up payment with us
                                        that comes directly from you.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#14"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            What benefits are there for Medical Providers?
                                        </button>
                                    </h5>
                                </div>
                                <div id="14" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        If you are looking at hiring a Nurse, you do not have to go through hundreds
                                        of resumes and waste time. You can glance
                                        at the workers that have applied for your job and see their qualifications.
                                        You can also request more information from
                                        them with our special chat feature in the website.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading3">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#15"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Is customer support available to help me?
                                        </button>
                                    </h5>
                                </div>
                                <div id="15" class="collapse" aria-labelledby="2" data-parent="#accordion">
                                    <div class="card-body">
                                        Yes we are here for any issues you have! Please click here to contact us!
                                        (please insert email link same as on contact
                                        page)
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--
            </div> --}}
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection