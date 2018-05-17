@extends("layouts/masterlayout")
@section("header")
<header class="header nav-bg">
    <!--logo start-->
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-original-title="Toggle Navigation" data-placement="right"></div>
    </div><!--logo start-->
    <a class="logo" href="index.html"><img id="harmonis-logo" src="{{ asset('img/harmonis-logo2.png') }}"></a> <!--logo end-->
    <div class="nav notify-row" id="top_menu">
      <!--  notification start -->
      <!--  notification end -->
    </div>
    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <li>
          <a class="logout" href="login.html">LOGOUT</a>
        </li>
      </ul>
    </div><!--logo end-->
  </header><!--header end-->
@endsection