<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('prepend-style')

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="/Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/Admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/Admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/Admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

    @stack('addon-style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg"
                 class="user-image" alt="User Image"/>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs text-white">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
                <img src="https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg"
                     class="img-circle" alt="User Image"/>
                <p>
                  {{ Auth::user()->name }}
                    <small>Administrator Smart Library UIN Malang</small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="nav-item">
            <a
              href="{{ route('logout') }}"
              class="btn btn-danger nav-link px-4 text-white"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
            </form>
          </li>
        </ul>
    </li> 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin-dashoard') }}" class="brand-link">
      <img src="https://kadowisudaku.com/wp-content/uploads/2020/04/UIN-Maulana-Malik-Ibrahim-Malang.png" alt="UIN Malang Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SI Library</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://png.pngtree.com/png-vector/20191009/ourmid/pngtree-user-icon-png-image_1796659.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>Admin Perpustakaan</b></a>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin-dashoard') }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('buku.index') }}" class="nav-link {{ (request()->is('admin/buku*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ (request()->is('admin/mahasiswa*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Data Mahasiswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dosen.index') }}" class="nav-link {{ (request()->is('admin/dosen*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Data Dosen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pengunjung-umum.index') }}" class="nav-link {{ (request()->is('admin/pengunjung-umum*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengunjung Umum
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('peminjaman.index') }}" class="nav-link {{ (request()->is('admin/peminjaman*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pengembalian.index') }}" class="nav-link {{ (request()->is('admin/pengembalian*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-undo"></i>
              <p>
                Pengembalian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cek-tanggungan') }}" class="nav-link {{ (request()->is('admin/cek-tanggungan*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Cek Tanggungan
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('admin/laporan-peminjaman*')) ? 'menu-open' : '' }} {{ (request()->is('admin/laporan-pengembalian*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Laporan Bulanan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporan-peminjaman', 1) }}" class="nav-link {{ (request()->is('admin/laporan-peminjaman*')) ? 'active' : '' }}">
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>Laporan Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan-pengembalian', 1) }}" class="nav-link {{ (request()->is('admin/laporan-pengembalian*')) ? 'active' : '' }}">
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>Laporan Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')
      
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2020 <a href="{{ route('admin-dashoard') }}">Smart Library</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@stack('prepend-script')

<!-- jQuery -->
<script src="/Admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/Admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<!-- DataTables -->
<script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="/Admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/Admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/Admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/Admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/Admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/Admin/plugins/moment/moment.min.js"></script>
<script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/Admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/Admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/Admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Admin/dist/js/demo.js"></script>

@stack('addon-script')

</body>
</html>
