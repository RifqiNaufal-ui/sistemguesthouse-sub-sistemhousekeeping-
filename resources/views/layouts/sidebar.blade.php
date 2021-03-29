
<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="menu-sidebar"><a href="{{ url('/dashboard') }}"><span class="fa fa-dashboard"></span> Dashboard</span></a></li> 
      @if(\Auth::user()->name == 'Admin')
      
      <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-bed"></i> <span>Room Section</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
        <!--   <li class="menu-sidebar"><a href="{{ url('/minibar-menu') }}"><span class="fa  fa-calculator"></span> Mini Bar Menu</span></a></li>  
          <li class="menu-sidebar"><a href="{{ url('/minibardaily') }}"><span class="fa fa-beer"></span> Mini Bar Daily Sales Report</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/orders') }}"><span class="fa fa-beer"></span> Order Mini Bar</span></a></li> -->
          <li class="menu-sidebar"><a href="{{ url('/room') }}"><span class="fa fa-bed"></span> Room</span></a></li>
          <!-- <li class="menu-sidebar"><a href="{{ url('/floorreports') }}"><span class="fa fa-building-o"></span> Floor Report</span></a></li> -->
          <li class="menu-sidebar"><a href="{{ url('/product') }}"><span class="fa fa-list-alt "></span> Mini Bar Products</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/orderrs') }}"><span class="fa fa-clipboard"></span> Order Mini Bar</span></a></li>
        </ul>

      <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-reddit-square"></i> <span>Laundry Internal</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
          <!-- <li class="menu-sidebar"><a href="{{ url('/controloflinen') }}"><span class="fa fa-exchange"></span> Control Of Linen Exchange</span></a></li> -->
          <li class="menu-sidebar"><a href="{{ url('/controls') }}"><span class="fa fa-exchange"></span> Control Of Linen Exchange</span></a></li>
          <!-- <li class="menu-sidebar"><a href="{{ url('/damages') }}"><span class="fa fa-exchange"></span> Damage Report</span></a></li> -->
         <!--  <li class="menu-sidebar"><a href="{{ url('/linenstock') }}"><span class="fa fa-book"></span> Linen Stock Book</span></a></li> -->
        <li class="menu-sidebar"><a href="{{ url('/packages') }}"><span class="fa fa-firefox"></span> Laundry Package</span></a></li>
        <li class="menu-sidebar"><a href="{{ url('/drycleanings') }}"><span class="fa fa-hourglass-2"></span> Proses In Out / Dry Cleaning</span></a></li>
        <!-- <li class="menu-sidebar"><a href="{{ url('/drycleaning') }}"><span class="fa fa-hourglass-2"></span> Proses In Out / Dry Cleaning</span></a></li> -->
        </ul>
      <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-reddit-square"></i> <span>Laundry External</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
          <li class="menu-sidebar"><a href="{{ url('/customers') }}"><span class="fa fa-user"></span> Customer</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/transactions') }}"><span class="fa fa-google-wallet"></span> Transaction Orders</span></a></li>
          <!-- <li class="menu-sidebar"><a href="{{ url('laundry-package') }}"><span class="fa fa-firefox"></span> Laundry Package</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/order-status') }}"><span class="fa fa-reorder"></span> Order Status</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/payment-status') }}"><span class="fa fa-rocket"></span> Payment Status</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-user"></span> Customer</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/transaction-orders') }}"><span class="fa fa-google-wallet"></span> Transaction Orders</span></a></li> -->
        </ul>
      <li class="header">OTHER</li>
       <!-- <li class="menu-sidebar"><a href="{{ url('/employee') }}"><span class="fa fa-users"></span> Employees</span></a></li> -->  
      <!-- <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li> -->
      @endif

       @if(\Auth::user()->name == 'Room')
        
        <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-bed"></i> <span>Room Section</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
          <li class="menu-sidebar"><a href="{{ url('/minibar-menu') }}"><span class="fa  fa-calculator"></span> Mini Bar Menu</span></a></li>  
          <li class="menu-sidebar"><a href="{{ url('/minibardaily') }}"><span class="fa fa-beer"></span> Mini Bar Daily Sales Report</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/floorreport') }}"><span class="fa fa-edit"></span> Floor Report</span></a></li>    
        </ul>
        <li class="header">OTHER</li>
      
          @endif

          @if(\Auth::user()->name == 'Laundry')

          <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-reddit-square"></i> <span>Laundry Internal</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
          <li class="menu-sidebar"><a href="{{ url('/controloflinen') }}"><span class="fa fa-exchange"></span> Control Of Linen Exchange</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/linenstock') }}"><span class="fa fa-book"></span> Linen Stock Book</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/drycleaning') }}"><span class="fa fa-hourglass-2"></span> Proses In Out / Dry Cleaning</span></a></li>
        </ul>
      <li class="active treeview menu-open">
      <a href="#">
      <i class="fa fa-reddit-square"></i> <span>Laundry External</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
        <ul class="treeview-menu">
          <!-- <li class="menu-sidebar"><a href="{{ url('/employee') }}"><span class="fa fa-users"></span> Employees</span></a></li>   -->
          <li class="menu-sidebar"><a href="{{ url('/laundry-package') }}"><span class="fa fa-firefox"></span> Laundry Package</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/order-status') }}"><span class="fa fa-reorder"></span> Order Status</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/payment-status') }}"><span class="fa fa-rocket"></span> Payment Status</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-user"></span> Customer</span></a></li>
          <li class="menu-sidebar"><a href="{{ url('/transaction-orders') }}"><span class="fa fa-google-wallet"></span> Transaction Orders</span></a></li>
        </ul>
        <li class="header">OTHER</li>

          @endif

      <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


    </ul>
  </section>