@extends('layouts.theme')
@section('title')
Medical Provider Registration
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
              <h2>Register</h2>
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
          <div class="col-lg-8 offset-md-2">
            <h3 class="mb-30 text-center">Law Firm Registration</h3>
            <form action="{{route('register')}}" method="POST" id="register">
              @csrf
              <div class="mt-10">
                <input type="text" value="{{old('name')}}" name="name" placeholder="Full Name"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required class="single-input">
              </div>
              @error('name')
              <div class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
              <div class="mt-10">
                <input type="text" value="{{old('username')}}" name="username" placeholder="Username"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
              </div>
              @error('username')
              <div class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
              <div class="mt-10">
                <input type="email" value="{{old('email')}}" name="email" placeholder="Email address"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                  class="single-input">
              </div>
              @error('email')
              <div class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
              <div class="mt-10">
                <input type="password" id="password" name="password" placeholder="Password"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
              </div>
              @error('password')
              <div class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
              <div class="mt-10">
                <input type="password" name="password_confirmation" placeholder="Password Confirmation"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Confirmation'" required
                  class="single-input">
              </div>
              @error('password_confirmation')
              <div class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </div>
              @enderror
              <input type="hidden" name="type" value="2">
              {{-- <div class="mt-2">
                <div class="primary-checkbox" style="display: inline-block;">
                  <input checked type="checkbox" required id="default-checkbox">
                  <label for="default-checkbox"></label>
                </div>
                <span>
                  I have read and I agree to the <a class="text-danger" href="{{route('home.provider.terms')}}"
                    target="_blank">Terms and
                    Conditions
                </span>
              </div> --}}
              <button class="btn btn-block btn-block mt-4" type="submit">Register</button>
            </form>
          </div>
        </div>
        {{--
      </div> --}}
    </div>
  </div>
  <!-- job post company End -->

</main>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
  $(function(){
    $("#register").validate({
      errorClass: "invalid-feedback",
    rules: {
      name : {
      required: true,
      minlength: 3
    },
    username: {
      required: true,
      minlength: 4
    },
    email: {
      required: true,
      email: true
    },
    password: {
      required: true,
      strong_password: true
    },
    password_confirmation: {
        equalTo: "#password"
        }
    }
    });
    $.validator.addMethod("strong_password", function (value, element) {
        let password = value;
        if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
        return false;
        }
        return true;
        }, function (value, element) {
        let password = $(element).val();
        if (!(/^(.{8,20}$)/.test(password))) {
        return 'Password must be between 8 and 20 characters long.';
        }
        else if (!(/^(?=.*[A-Z])/.test(password))) {
        return 'Password must contain atleast one uppercase.';
        }
        else if (!(/^(?=.*[a-z])/.test(password))) {
        return 'Password must contain atleast one lowercase.';
        }
        else if (!(/^(?=.*[0-9])/.test(password))) {
        return 'Password must contain atleast one digit.';
        }
        else if (!(/^(?=.*[@#$%&])/.test(password))) {
        return "Password must contain special characters from @#$%&.";
        }
        return false;
        });
  });
</script>
@endsection
@section('css')
<style>
  .error {
    color: red;
  }
</style>
@endsection