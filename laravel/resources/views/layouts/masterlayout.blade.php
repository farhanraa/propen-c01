<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HARMONIS</title>
  </script><!-- import css -->
  <script src="{{ asset('js/jquery-3.3.1.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript">
  </script>
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ asset('lineicons/style.css') }}" rel="stylesheet" type="text/css"><!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-timepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap-collapsible.css') }}" rel="stylesheet">
  <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
  <script src="{{ asset('js/chart-master/Chart.js') }}">
  </script>
  <link href="{{ asset('img/megacapital.png') }}" rel="shortcut icon">
</head>
<body>
  <section id="container">
    <header class="header nav-bg">
    <!--logo start-->
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-original-title="Toggle Navigation" data-placement="right"></div>
    </div><!--logo start-->
    <a class="logo" href="{{route('dashboard')}}"><img id="harmonis-logo" src="{{ asset('img/harmonis-logo2.png') }}"></a> <!--logo end-->
    <div class="nav notify-row" id="top_menu">
      <!--  notification start -->
      <!--  notification end -->
    </div>
    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <li>

          <a class="logout" href="/logout">LOGOUT</a>
        </li>
      </ul>
    </div><!--logo end-->


  </header><!--header end-->
   <aside>
      <div class="nav-collapse pre-scrollable" id="sidebar">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="menu" style="list-style: none; display: inline">
            <p class="centered"><a class="profile-pic" href="{{route('lihatProfil')}}" ></a></p>
            <h4 class="centered" style="font-weight: bold">{{ Auth::user()->username }}</h4>
            <h6 class="centered" style="font-weight: lighter; margin-top: -0.75rem;">{{ Auth::user()->username }}</h6>

          </li>
          <li class="mt">   
            <li class="sub-menu">
              <a href="javascript:;"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            <ul class="sub">
               @if(Auth::user()->role === 'hrManager' || Auth::user()->role === 'headOfDepartment')
              <li>
                <a href="/dashboard">Tren</a>
              </li>
              <li>
                <a href="/report">Report</a>
              </li>
               @endif
           </ul>
          </li>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-desktop"></i> <span>Profile</span></a>
            <ul class="sub">
               @if(Auth::user()->role === 'hrManager')
              <li>
                <a href="/profile/view">Lihat Profile</a>
              </li>
              <li>
                <a href="/profile/view/all">Lihat Profile Pegawai</a>
              </li>
              <li>
                <a href="/profile/approval">Persetujuan</a>
              </li>
              @else
              <li>
                <a href="/profile/view">Lihat Profile</a>
              </li>
               @endif
           </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-cogs"></i> <span>Absen</span></a>
            <ul class="sub">
              @if(Auth::user()->role === 'adminCab')
              <li>
                <a href="/absen/upload">Upload Absen</a>
              </li>
              <li>
                <a href="/absen/view">Lihat Absen</a>
              </li>
              @elseif(Auth::user()->role === 'hrManager')
              <li>
                <a href="/absen/view">Lihat Absen</a>
              </li>
              <li>
                <a href="/absen/view/all">Lihat Absen Pegawai</a>
              </li>
              @else
              <li>
                <a href="/absen/view">Lihat Absen</a>
              </li>
              @endif
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-calendar"></i> <span>Cuti</span></a>
            <ul class="sub">

              @if(Auth::user()->role === 'headOfDepartment')

              <li>
                <a href="/leave/form">Form Pengajuan</a>
              </li>
              <li>
                <a href="/leave/approval">Persetujuan</a>
              </li>
              @elseif(Auth::user()->role === 'hrManager')

              <li>
                <a href="/leave/form">Form Pengajuan</a>
              </li>
              <li>
                <a href="/leave/approval">Persetujuan</a>
              </li>

              @else
              <li>
                <a href="/leave/form">Form Pengajuan</a>
              </li>
              @endif

            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-book"></i> <span>Klaim</span></a>
            <ul class="sub">

              @if(Auth::user()->role === 'hrManager' || Auth::user()->role === 'finance')
              <li>
                <a href="/claim/form">Form Pengajuan</a>
              </li>
              <li>
                <a href="/claim/approval">Persetujuan</a>
              </li>
              @else
              <li>
                <a href="/claim/form">Form Pengajuan</a>
              </li>

              @endif
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-tasks"></i> <span>Izin</span></a>
            <ul class="sub">
              @if(Auth::user()->role === 'headOfDepartment')
              <li >
                <a href="/permission/form">Form Pengajuan</a>
              </li>
              <li >
                <a href="/permission/approval">Persetujuan</a>
              </li>
              @elseif(Auth::user()->role === 'hrManager')
                <li >
                <a href="/permission/form">Form Pengajuan</a>

              </li>
              <li >
                <a href="/permission/approval">Persetujuan</a>
              </li>

              @else
              <li >
                <a href="/permission/form">Form Pengajuan</a>
              </li>
              @endif

            </ul>
          </li>
           <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-book"></i> <span>Lembur</span></a>
            <ul class="sub">
              @if(Auth::user()->role === 'headOfDepartment')
              <li>
                <a href="/overtime/form">Form Pengajuan</a>

              </li>
              <li>
                <a href="/overtime/approval">Persetujuan</a>
              </li>
               @elseif(Auth::user()->role === 'hrManager')
                <li>
                <a href="/overtime/form">Form Pengajuan</a>

              </li>
              <li>
                <a href="/overtime/approval">Persetujuan</a>
              </li>

              @else
              <li>
                <a href="/overtime/form">Form Pengajuan</a>
              </li>
          </li>
          @endif

              </li>
          </li>


        </ul><!-- sidebar menu end-->
      </div>
    </aside><!--sidebar end-->
    <section id="main-content"><!--
      <div class="alert alert-success">
        Selamat datang, <strong>{{ Auth::user()->username }}!</strong>
      </div> -->
      @yield('main')
    </section>
  <a href="#" id="scroll-top" style="display: none;"><span></span></a>
  </section>
  </section><!--main content end-->
  <script src="{{ asset('js/bootstrap.min.js') }}">
  </script>
  <script class="include" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}" type="text/javascript" >
  </script>
  <script src="{{ asset('js/common-scripts.js') }}">
  </script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript">
  </script>
  <script class="include" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }} " type="text/javascript">
  </script>
  <script src="{{ asset('js/jquery.scrollTo.min.js') }}">
  </script>
  <script src= "{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/jquery.sparkline.js') }}">
  </script> 
  <script src="{{ asset('js/jquery.number.js') }}">
  </script>
  <script src="{{ asset('js/bootstrap-timepicker.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/bootstrap-timepicker.min.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript">
  </script>
  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript">
  </script> 
  <script src="{{ asset('js/raphael-min.js') }}">
  </script>  
  <script src="{{ asset('js/morris.min.js') }}">
  </script> 
  <script src="{{ asset('js/charts.js') }}">
  </script>
</body>
</html>
