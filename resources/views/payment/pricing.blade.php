@extends('layouts.theme')
@section('title')
Pricing
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
                            <h2>Pricing Plans</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="pricing py-5">
                    <div class="container">
                        <div class="flash-message" id='success-alert'>
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <!-- Free Tier -->
                            <div class="col-lg-5">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">Monthly</h5>
                                        <h6 class="card-price text-center">$99.99</h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><strong> 12 Month Membership </strong></li>
                                            <li>We will charge your card every month for 12 months. </li>
                                            <li>This is a contract for one year and your card will be billed on the same
                                                day each month for 12 consectituve months. You cannot cancel until you
                                                make 12 consecutive payments.
                                            </li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="{{route('sub.create', 'price_1JyNWNGqRK6BsmxzpZaS2uFu')}}"
                                                class="btn btn-primary text-uppercase plan">Subscribe</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Plus Tier -->
                            <div class="col-lg-5">
                                <div class="card mb-5 mb-lg-0">
                                    <div class="card-body">
                                        <h5 class="card-title text-muted text-uppercase text-center">Annually</h5>
                                        <h6 class="card-price text-center">$949.99
                                        </h6>
                                        <hr>
                                        <ul class="fa-ul">
                                            <li><strong>12 Month Membership</strong></li>
                                            <li>Save 20% when paying up front. </li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="{{route('sub.create', 'price_1JyNWGGqRK6Bsmxzvc6zHpJu')}}"
                                                class="btn btn-primary text-uppercase plan">Subscribe</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
{{-- <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <button class="btn">Continue with Card</button>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn">Continue with Bank</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('js')
{{-- <script>
    $(function(){
            $(".plan").on('click', function(e){
                e.preventDefault();
                $('#checkout').modal('show');
            })
        });
</script> --}}
@endsection
@section('css')
<style>
    /* section.pricing {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    } */
    .pricing .card {
        border: none;
        border-radius: 1rem;
        transition: all 0.2s;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .pricing hr {
        margin: 1.5rem 0;
    }

    .pricing .card-title {
        margin: 0.5rem 0;
        font-size: 0.9rem;
        letter-spacing: .1rem;
        font-weight: bold;
    }

    .pricing .card-price {
        font-size: 3rem;
        margin: 0;
    }

    .pricing .card-price .period {
        font-size: 0.8rem;
    }

    .pricing ul li {
        margin-bottom: 1rem;
    }

    .pricing .text-muted {
        opacity: 0.7;
    }

    .pricing .btn {
        text-align: center;
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        width: 100%;
        padding: 1.5rem;
        /* opacity: 0.7; */
        transition: all 0.2s;
    }

    /* Hover Effects on Card */
    @media (min-width: 992px) {
        .pricing .card:hover {
            margin-top: -.25rem;
            margin-bottom: .25rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
        }

        .pricing .card:hover .btn {
            opacity: 1;
        }
    }
</style>
@endsection