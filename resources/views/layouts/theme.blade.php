<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - LegalConnect</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="apple-touch-icon" sizes="36x36" href="{{asset('favicon/android-36x36.jpg')}}">
    <link rel="apple-touch-icon" sizes="16x16" href="{{asset('favicon/favicon-16x16')}}">
    <link rel="apple-touch-icon" sizes="32x32" href="{{asset('favicon/favicon-32x32.jpg')}}">
    <link rel="apple-touch-icon" sizes="96x96" href="{{asset('favicon/favicon-96x96.jpg')}}">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <script>
        (function(i, s, o, g, r, a, m) {
          i['GoogleAnalyticsObject'] = r;
          i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date();
          a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
          a.async = 1;
          a.src = g;
          m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    
        ga('create', 'UA-19175540-9', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('images/logo-icon.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{route('home.index')}}"><img src="{{asset('images/logo.png')}}"
                                        class="logo-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="{{route('home.index')}}">Home</a></li>
                                            <li><a href="{{route('home.jobs.index')}}">Find A Job </a></li>
                                            <li><a href="{{route('home.about')}}">About</a></li>
                                            <li><a href="{{route('home.contact.index')}}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @if (!(Auth::check()))
                                    <a href="#" class="btn head-btn1" data-toggle="modal"
                                        data-target="#exampleModalCenter">Register
                                    </a>
                                    <a href="{{route('login')}}" class="btn head-btn2">Login</a>
                                    @else
                                    @php
                                    $user = Auth::user();
                                    if($user->type == 1)
                                    {
                                    $route = route('nurse.index');
                                    }
                                    if($user->type == 2)
                                    {
                                    $route = route('provider.index');
                                    }
                                    if($user->type == 3)
                                    {
                                    $route = route('admin.index');
                                    }
                                    @endphp
                                    <a href="{{$route}}" class="btn head-btn1">Dashboard
                                    </a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                             document.getElementById('logout-form').submit();"
                                        class="btn head-btn2">Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @yield('contents')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p>Legal Connect is a technology based legal staffing agency that connects
                                            Law Firms with Legal Workers.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address : 150 E Palmetto Park Rd.<br /> Suite 800
                                            Boca Raton, FL 33432

                                        </p>
                                    </li>
                                    <li><a href="tel:+1-855-940-JOBS">Phone : +1-855-940-JOBS</a></li>
                                    <li><a href="mailto:contact@legalconnectus.com">Email :
                                            contact@legalconnectus.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Links</h4>
                                <ul>
                                    <li><a href="{{route('home.nurse.terms')}}">Legal Worker Terms & Conditions</a>
                                    </li>
                                    {{-- <li><a href="{{route('home.provider.terms')}}">Medical Provider Terms &
                                            Conditions</a>
                                    </li> --}}
                                    <li><a href="{{route('faq')}}">Frequently Asked Questions</a></li>
                                    <li><a href="{{route('home.contact.index')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Coming Soon!</p>
                                </div>
                                <!-- Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <p>
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved.
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="https://www.facebook.com/medconnectus" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/medconnectus/" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/76554646/admin" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mb-3">
                                <h4>Please choose:</h4>
                            </div>
                            <div class="col-6">
                                <a href="{{route('register.nurse')}}" class="btn btn-secondary">Legal Worker</a>
                            </div>
                            <div class="col-6">
                                <a href="{{route('register.provider')}}" class="btn btn-primary">Law Firm</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, opper, Bootstrap -->
    <script src="{{asset('/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mbile Menu -->
    <script src="{{asset('/assets/js/jquery.slicknav.min.js')}}"></script>
    <!-- Jquery S'ick , Owl-Carousel Plugins -->
    <script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('/assets/js/price_rangs.js')}}"></script>
    <!-- One Page Animated-HeadLin -->
    <script src="{{asset('/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.magnific-popup.js')}}"></script>
    <!-- Scrollup nice-select, sticky -->
    <script src="{{asset('/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.sticky.js')}}"></script>
    <!-- contacts -->
    <script src="{{asset('/assets/js/contact.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('/assets/js/plugins.js')}}"></script>
    <script src="{{asset('/assets/js/main.js')}}"></script>
    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e0eece97e39ea1242a2d5b5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
    </script> --}}
    <!--End of Tawk.to Script-->
    @yield('js')
</body>

</html>