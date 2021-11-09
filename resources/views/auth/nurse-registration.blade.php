<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">

  <meta name="author" content="Web Master Driver">
  <title>Nurses' Registration - Med Connect</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap3.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/main_style.css')}}" rel="stylesheet">
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
    <div class="about-wrapper">
      <div class="container">
        <header class="head-main">
          <div class="row">
            <div class="col-lg-3 col-xs-10 pull-left"> <a href="index.php"
                class="navbar-brand d-flex align-items-center"><img src="{{asset('images/logo.png')}}" alt=" "></a>
            </div>
            <div class="col-lg-6 res-nav">
              <div class="top-nav">

              </div>
            </div>
            <div class="col-lg-3 col-xs-2 pull-right">
              <div class="sp-10">

              </div>
            </div>
        </header>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-head">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="blog sp-80">
      <div class="container">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="request-quote">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">

                  <h2>Nurses' Registration</h2>

                </div>
                <div class="col-sm-12 col-md-12 col-xs-12">
                  <h3>Create Login Details</h3>
                </div>
              </div>
              <div class="formBox">
                <form method="POST" action="{{route('register')}}" onsubmit="return checkForm(this);">
                  @csrf
                  @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    :message
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>')) !!}
                  @endif
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="inputBox">
                        <div class="inputText">Your Email </div>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="input" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="inputBox ">
                        <input type="hidden" value="" id="txtHint">
                        <div class="inputText">Username </div>
                        <input type="text" name="username" value="{{old('username')}}" minlength="4" id="fname"
                          class="input" required>
                      </div>
                      @error('username')
                      <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="col-sm-4">
                      <div class="inputBox ">
                        <div class="inputText">Password </div>
                        <input type="password" value="{{old('password')}}" name="password" id="lname" class="input"
                          required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="type" value="1">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="chiller_cb">
                        <input id="myCheckbox2" type="checkbox" required>
                        <label for="myCheckbox2">I have read and I agree to the <a href="{{route('home.nurse.terms')}}"
                            target="_blank">Terms and
                            Conditions</a></label>
                        <span></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-sm-3">
                      <button type="submit" name="submitnurses" id="submivt" class="new-btn">CONTINUE</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>


  <div class="clearfix"></div>

  <!-- Footer -->
  <section id="footer" class="footer">
    <div class="footer-dark">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 mt-2 mt-sm-2 text-center text-white">
          <p class="h6">© {{date('Y')}} - MedConnect. All Rights Reserved. <a
              href="mailto:contact@medconnectus.com"><strong>Contact Us</strong></a></p>
        </div>
      </div>
    </div>
  </section>
  <!-- ./Footer -->
  <div id='toTop'><img src="images/toparrow.png" alt=""></div>
</body>
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
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
<script src="js/swiper.min.js"></script>
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

</html>