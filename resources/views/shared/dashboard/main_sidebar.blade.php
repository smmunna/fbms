 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">

     {{-- Admin Sidebar --}}
     @if (auth()->user()->role == 'admin')
         <!-- Brand Logo -->
         <a href="{{ route('admin.dashboard') }}" class="brand-link">
             <img src={{ asset('dashboard/dist/img/AdminLTELogo.png') }} alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">FBMS</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 <div class="image">
                     <img src={{ asset(auth()->user()->photo) }} class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info">
                     <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
                 </div>
             </div>

             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                     <li class="nav-item menu-open">
                         <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Flats
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('admin.all.flat') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>All Flats</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('pending.flat') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Pending Flats</p>
                                 </a>
                             </li>
                         </ul>
                     </li>


                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Add
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('properties.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Property</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('locations.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Location</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('admin.userlist') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Users
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('orders.index') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Bookings
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('admin.orders.report') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Reports
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('notices.index') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Notices
                             </p>
                         </a>
                     </li>


                     <li class="nav-item">
                         <a href="{{ route('logout') }}" class="nav-link">
                             <i class="nav-icon far fa-circle text-danger"></i>
                             <p class="text">Logout</p>
                         </a>
                     </li>
                 </ul>
             </nav>
             <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
     @endif

     {{-- Owner sidebar --}}
     @if (auth()->user()->role == 'owner')
         <!-- Brand Logo -->
         <a href="{{ route('owner.dashboard') }}" class="brand-link">
             <img src={{ asset('dashboard/dist/img/AdminLTELogo.png') }} alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">FBMS</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 <div class="image">
                     <img src={{ asset(auth()->user()->photo) }} class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info">
                     <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
                 </div>
             </div>

             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                     <li class="nav-item menu-open">
                         <a href="{{ route('owner.dashboard') }}" class="nav-link active">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('flats.index') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Flats
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('owner.orders') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Bookings
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('owner.myorders') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 My Bookings
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('owner.notices') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Notices
                             </p>
                         </a>
                     </li>




                     <li class="nav-item">
                         <a href="{{ route('logout') }}" class="nav-link">
                             <i class="nav-icon far fa-circle text-danger"></i>
                             <p class="text">Logout</p>
                         </a>
                     </li>
                 </ul>
             </nav>
             <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
     @endif


     {{-- User sidebar --}}
     @if (auth()->user()->role == 'user')
         <!-- Brand Logo -->
         <a href="{{ route('user.dashboard') }}" class="brand-link">
             <img src={{ asset('dashboard/dist/img/AdminLTELogo.png') }} alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">FBMS</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 <div class="image">
                     <img src={{ asset(auth()->user()->photo) }} class="img-circle elevation-2" alt="User Image">
                 </div>
                 <div class="info">
                     <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
                 </div>
             </div>

             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
  with font-awesome or any other icon font library -->
                     <li class="nav-item menu-open">
                         <a href="{{ route('user.dashboard') }}" class="nav-link active">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Dashboard
                             </p>
                         </a>
                     </li>

                     {{-- <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Tables
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="pages/tables/simple.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Simple Tables</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/tables/data.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>DataTables</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/tables/jsgrid.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>jsGrid</p>
                                 </a>
                             </li>
                         </ul>
                     </li> --}}

                     <li class="nav-item">
                         <a href="{{ route('user.orders') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 My Orders
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('user.notices') }}" class="nav-link">
                             <i class="nav-icon far fa-calendar-alt"></i>
                             <p>
                                 Notices
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('logout') }}" class="nav-link">
                             <i class="nav-icon far fa-circle text-danger"></i>
                             <p class="text">Logout</p>
                         </a>
                     </li>
                 </ul>
             </nav>
             <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
     @endif


 </aside>
