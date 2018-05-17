  @extends("layouts/masterlayout") 
  @section("sidebar")
    <!--sidebar start-->
    <aside>
      <div class="nav-collapse" id="sidebar">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="menu" style="list-style: none; display: inline">
            <p class="centered"><img class="profile-pic" src="{{ asset('img/user2.png') }}"></p>
            <h4 class="centered" style="font-weight: bold">Marcel Newman</h4>
            <h6 class="centered" style="font-weight: lighter; margin-top: -0.75rem;">marcel.newman kendor</h6>
          </li>
          <li class="mt">
            <a class="active" href="index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-desktop"></i> <span>Attendance</span></a>
            <ul class="sub">
              <li>
                <a href="general.html">General</a>
              </li>
              <li>
                <a href="buttons.html">Buttons</a>
              </li>
              <li>
                <a href="panels.html">Panels</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-cogs"></i> <span>Leave</span></a>
            <ul class="sub">
              <li>
                <a href="calendar.html">Calendar</a>
              </li>
              <li>
                <a href="gallery.html">Gallery</a>
              </li>
              <li>
                <a href="todo_list.html">Todo List</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-book"></i> <span>Claim</span></a>
            <ul class="sub">
              <li>
                <a href="blank.html">Blank Page</a>
              </li>
              <li>
                <a href="login.html">Login</a>
              </li>
              <li>
                <a href="lock_screen.html">Lock Screen</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"><i class="fa fa-tasks"></i> <span>Permission</span></a>
            <ul class="sub">
              <li>
                <a href="/permission/form">Form Izin</a>
              </li>
            </ul>
          </li>
         
        </ul><!-- sidebar menu end-->
      </div>
    </aside><!--sidebar end-->

@endsection