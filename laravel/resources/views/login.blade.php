<!DOCTYPE html>
<html lang="en">
<head>
  <title>HARMONIS | Masuk </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ asset('public/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/login-util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/css/login-main.css') }}">

</head>
<body style="background-color: #999999;">
  <div class="limiter">
    <div class="container-login100">
      <div class="login100-more" style="background-image: url('{{asset('public/img/bg-02.jpg')}}');"></div>
      <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form class="login100-form validate-form" action="/login" method="post">
          <img id="logo-mega" src="{{ asset('public/img/megacapital.png') }}">
          <span class="login100-form-title p-b-24">
            Masuk ke Harmonis
          </span>
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <span class="label-input100">Email</span>
            <input class="input100" type="text" name="email" placeholder="Email" >
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          <div class="container-login100-form-btn" style="margin-left: 5.5rem;">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button class="login100-form-btn" type="submit">
                <strong>Log in</strong>
              </button>
            </div>

            <!-- <a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
              Sign up
              <i class="fa fa-long-arrow-right m-l-5"></i>
            </a> -->
          </div>
        </form>
      </div>
    </div>
  </div>
<!--===============================================================================================-->
  <script src="{{ asset('public/vendor/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('public/vendor/popper.js') }}"></script>
  <script src="{{ asset('public/vendor/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/js/login-main.js') }}"></script>

</body>
</html>

