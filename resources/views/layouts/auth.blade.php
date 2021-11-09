<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <meta name="author" content="">
  <title>Welcome - MedConnect</title>
  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap3.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('css/main_style.css')}}" rel="stylesheet">
  <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet">
  <!-- Start of Async Drift Code -->
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.min.css')}}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-T8D6NPBCF2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T8D6NPBCF2');
  </script>
  <script type="text/javascript">
    function checkForm(form) {
      if (form.username.value == "") {
        alert("Error: Username cannot be blank!");
        form.username.focus();
        return false;
      }
      re = /^\w+$/;
      if (!re.test(form.username.value)) {
        alert("Error: Username must contain only letters, numbers and underscores!");
        form.username.focus();
        return false;
      }


      if (form.password.value.length < 8) {
        alert("Error: Password must contain at least eight characters!");
        form.password.focus();
        return false;
      }
      if (form.password.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.password.focus();
        return false;
      }
      re = /[0-9]/;
      if (!re.test(form.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password.focus();
        return false;
      }
      re = /[a-z]/;
      if (!re.test(form.password.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if (!re.test(form.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
      }

      return true;
    }
  </script>



</head>

<body>
  <section>
    <div class="main-wrapper">
      <div class="container">
        <header class="head-main">
          <div class="row">
            <div class="col-lg-3 col-xs-10 pull-left"> <a href="{{route('/')}}"
                class="navbar-brand d-flex align-items-center"><img src="{{asset('images/logo.png')}}" alt=" "></a>
            </div>
            <div class="col-lg-6 res-nav">
              <div class="top-nav">

              </div>
            </div>
            <div class="col-lg-3 col-xs-2 pull-right">
              <div class="sp-10">
                <div class="btn all-btn2"><a href="#about" style="margin-right:1rem;">ABOUT US </a> <a
                    href="{{route('faq')}}">FAQ </a>
                </div>
              </div>

              <div class="mdola">
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><img src="{{asset('images/logo.png')}}"
                            alt=" "></button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="request-quote">
                          <div class="container">
                            <div class="row">
                              <div class="col-sm-12 col-md-12 col-xs-12">
                                <button type="button" class="close" data-dismiss="modal"><img src="images/close.png"
                                    alt=" "></button>
                                <h2>Register</h2>

                              </div>
                              <div class="col-sm-12 col-md-12 col-xs-12">
                                <h3>Please Register as a Nurse or Medical Provider </h3>
                              </div>
                            </div>
                            <div class="formBox">

                              <div class="row">
                                <div class="col-sm-4">
                                  <div class="inputBox">
                                    <a href="{{route('register.nurse')}}"><button id="submivt"
                                        class="new-btn">NURSE</button></a>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="inputBox ">
                                    <a href="{{route('register.provider')}}"><button id="submivt"
                                        class="new-btn">MEDICAL
                                        PROVIDER</button></a>
                                  </div>
                                </div>

                              </div>


                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </header>
        <div class="banner-content">
          <div class="row">
            <div class="col-sm-5">
              <div class="sonar-wrapper">
                <div class="sonar-emitterd" align='center'>
                  <div class="H-logo"> <br></div>
                  <div class="sonar-wave"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="right-con">
                <h1><img src="{{asset('images/logo-2.png')}}" width="80%" alt=" " /></h1>
                <br>
                {{-- {{dd(session()->all())}} --}}

                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="flash-message" id='success-alert'>
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert text-dark alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                        class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                  </div>
                  @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    :message
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>')) !!}
                  @endif
                  <p><input type="text" class="form-control" name="username" minlength="4" placeholder="Username"
                      style="height: 50px;"></p>
                  <p><input type="password" class="form-control" name="password" placeholder="Password"
                      style="height: 50px;"></p>

                  <p style="color: white;"><strong><a href="{{ route('password.request') }}"
                        style="color: #6CB6EF;">Forgot
                        Password?</a></strong></p>

                  <div class="btn all-btn"><button name="login" type="submit">LOGIN</button></div>

                  <div class="btn all-btn"><a href="#" data-toggle="modal" data-target="#myModal">REGISTER</a></div>
                  <br>
                </form>
                <p style="color: black;"><strong>Where Nurses Connect with Hospitals and Medical
                    Providers for
                    Jobs.</strong></p>

              </div>
            </div>
          </div>
        </div>
        <div class="img-carso">
          <div class="destop-version">
            <div class="container">
              <div class=" row">
                <div class="col-lg-9 col-sm-12">
                  <div class="brand-slider">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#blogCarousel" data-slide-to="1"></li>
                      </ol>


                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 ">

                </div>
              </div>
            </div>
          </div>
          <div class="mobile-version">
            <div class="down-arrow">
              <button id="Trigger"><i class="fa fa-arrow-down"></i></button>
            </div>
            <div id="Slider" class="slideup">
              <div id="Actual">
                <div class="container">
                  <div class=" row">
                    <div class="col-sm-9">
                      <div class="brand-slider">
                        <div id="blogCarousel1" class="carousel slide" data-ride="carousel">

                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3 col-xs-12 ">
                      <div class="btn border-btn"><a href="#about">ABOUT US </a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="sp-30"></div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="about-us-bot-section" id="about" style="background-color: #E6E6E6;">
      <div class="container">
        <div class="white-line"></div>
        <span class="mini-title">WHAT WE DO</span>
        <div class="clearfix"></div>
        <h2>About Us</h2>
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <p>
              MedConnect is a technology based staffing agency specializing in connecting Nurses with
              potential job
              opportunities. We are set up to lower the cost and save time during the hiring process for
              medical
              providers. Nurses earn more money and have more employment options with MedConnect.


              We make the hiring process and job searching easier and more streamlined than ever before.
            </p><br>
            <div class="col-lg-3 col-sm-12 col-xs-12 ">
              <div class="btn all-btn2"><a href="how.php">HOW IT WORKS </a></div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="services" id="tabs">
      <div class="container ">
        <div class="row">
          <div class="clearfix"></div>
          <div class="col-md-6">
            <h3>Benefits to Nurses</h3>

            <p><i class="fa fa-check-square-o fa-2x"></i> Reduced hiring costs allows providers to pay more
              money.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Search for jobs you want where you want by zip
              code.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Jobs include full time, per diem and travel
              nursing.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Easy to use templates instead of a resumes.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Many jobs offer no long term commitments.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Opportunity to freelance and work when you want
              to.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Work multiple jobs and only deal with us for
              payment.</p>

          </div>
          <div class="col-md-6">
            <h3>Benefits to Medical Providers</h3>

            <p><i class="fa fa-check-square-o fa-2x"></i> Hiring cost substantially reduced with flexible
              payment
              options.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Let us do all the work. You pay us. We pay the
              nurse (other
              options available).</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> No more going through hundreds of resumes.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Find nurses in one place for all available jobs,
              specialities,
              and locations.</p>
            <p><i class="fa fa-check-square-o fa-2x"></i> No penalties or large fees for hirings that do not
              work out.
            </p>
            <p><i class="fa fa-check-square-o fa-2x"></i> Concierge Service with dedicated Connector
              available.</p>

          </div>
        </div>
      </div>
    </div>

    <div class="say-hello">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <h3><span>SAY</span> <br>
              HELLO</h3>
          </div>
          <div class="col-sm-6">
            <div class="lets-project">
              <h4>Do you have any <strong>questions</strong>?</h4>
              <div class="btn all-btn2"><a href="mailto:contact@medconnectus.com">CONTACT US </a></div>
            </div>
          </div>
          <div class="col-sm-4"> <img src="{{asset('images/say-hello.png')}}" alt=" "> </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Footer -->
  <section id="footer" class="footer">
    <div class="footer-dark">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 mt-2 mt-sm-2 text-center text-white">
          <p class="h6">© 2021 - MedConnect. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- ./Footer -->
  <div id='toTop'><img src="images/toparrow.png" alt=""></div>
  <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script>
    $(document).ready(function() {
      $('.nav-button').click(function() {
        $('body').toggleClass('nav-open');
      });
    });
    $('#blogCarousel').carousel({
      interval: 2500
    });
    $('#blogCarousel1').carousel({
      interval: 2500
    });

    $(".input").focus(function() {
      $(this).parent().addClass("focus");
    })
  </script>
  <script src="{{asset('js/swiper.min.js')}}"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      effect: 'slide',
      autoplay: true,

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    var TxtType = function(el, toRotate, period) {
      this.toRotate = toRotate;
      this.el = el;
      this.loopNum = 0;
      this.period = parseInt(period, 10) || 2000;
      this.txt = '';
      this.tick();
      this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
      var i = this.loopNum % this.toRotate.length;
      var fullTxt = this.toRotate[i];

      if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
      } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
      }

      this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

      var that = this;
      var delta = 200 - Math.random() * 100;

      if (this.isDeleting) {
        delta /= 2;
      }

      if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
      } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
      }

      setTimeout(function() {
        that.tick();
      }, delta);
    };

    window.onload = function() {
      var elements = document.getElementsByClassName('typewrite');
      for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
      }

      var css = document.createElement("style");
      css.type = "text/css";
      css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
      document.body.appendChild(css);
    };

    $("#Trigger").click(function() {
      $("#Slider").toggleClass("slidedown slideup");
    });

    $("#Trigger2").click(function() {
      $("#Slider2").toggleClass("slidedown slideup");
    });
  </script>
  <script>
    jQuery(function() {
      //alert('hello');
      $("#submit").click(function() {
        //alert('hello');
        $(".error").hide();
        var hasError = false;
        var phone = /^[1-9]{1}[0-9]{9}$/
        var phoneVal = $("#phone").val();

        var fname = /^[a-zA-Z]*$/
        var fnameVal = $("#fname").val();

        var lname = /^[a-zA-Z]*$/
        var lnameVal = $("#lname").val();

        if (fnameVal == '') {
          $("#fname").after('<span class="error" style="color:red;">Please Enter First Name</span>');
          hasError = true;
        } else if (!fname.test(fnameVal)) {
          $("#fname").after(
            '<span class="error" style="color:red;">Your First Name Is Not Valid Please Enter Letters Only</span>'
          );
          hasError = true;
        }
        if (lnameVal == '') {
          $("#lname").after('<span class="error" style="color:red;">Please Enter Last Name</span>');
          hasError = true;
        } else if (!lname.test(lnameVal)) {
          $("#lname").after(
            '<span class="error" style="color:red;">Your Last Name Is Not Valid Please Enter Letters Only</span>'
          );
          hasError = true;
        }
        if (phoneVal == '') {
          $("#phone").after('<span class="error" style="color:red;">Please Enter Mobile Number</span>');
          hasError = true;
        } else if (!phone.test(phoneVal)) {
          $("#phone").after(
            '<span class="error" style="color:red;">Your Mobile Number Is Not Valid Please Enter Numbers Only</span>'
          );
          hasError = true;
        }

        if (hasError == true) {
          return false;
        }

      });

    });
  </script>
  {{-- <script src="../ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
  <script>
    $(window).scroll(function() {
      //alert('hello');
      if ($(this).scrollTop() > 4500) {
        $('#toTop').fadeIn();
        //alert('hello');
      } else {
        $('#toTop').fadeOut();
      }
    });

    $("#toTop").click(function() {
      //1 second of animation time
      //html works for FFX but not Chrome
      //body works for Chrome but not FFX
      //This strange selector seems to work universally
      $("html, body").animate({
        scrollTop: 0
      }, 500);
    });
  </script>
  {{-- <script src="../code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="../cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> --}}
  <script>
    $(document).ready(function() {
    //   $("#testimonial-slider").owlCarousel({
    //     items: 2,
    //     itemsDesktop: [1000, 2],
    //     itemsDesktopSmall: [979, 2],
    //     itemsTablet: [768, 1],
    //     pagination: true,
    //     navigation: false,
    //     autoplay: true
    //   });
    });
  </script>
</body>

</html>