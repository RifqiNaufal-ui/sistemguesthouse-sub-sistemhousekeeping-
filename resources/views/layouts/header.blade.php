<!-- Logo -->
<?php
  $dt = \App\User::where('id',\Auth::user()->id)->first();
?>
<a href="#" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>H</b>K</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Housekeeping</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <!-- Tasks: style can be found in dropdown.less -->
      
      <!-- User Account: style can be found in dropdown.less -->
      
      

      <!-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Product Attention</li>
              <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu">
                  
                </ul>
              </li>
              <li class="footer"><a href="{{ url('dashboard') }}">View all</a></li>
            </ul>
          </li> -->
          
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- <img src="" class="user-image" alt="User Image"> -->
          <span class="hidden-xs">{{\Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <!-- <img src="./img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

            <p>
              {{\Auth::user()->name}}
              <small>{{ \Auth::user()->name }}</small>
              <small>{{ \Auth::user()->email }}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <!-- <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat menu-sidebar">Profile</a>
            </div> -->
            <div class="pull-right">
            <a href="{{ url('keluar') }}" class="btn btn-default btn-flat menu-sidebar">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
      
    </ul>
  </div>

</nav>