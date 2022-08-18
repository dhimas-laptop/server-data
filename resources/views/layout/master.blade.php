<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BPDASHL SEIJANG DURIANGKANG</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- font awesome-->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- google icon -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"   rel="stylesheet">
  <link rel="icon" href="{{ asset('/tdash/images/logo.png') }}">
  
  @yield('css')
</head>
<body class="white-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  @if (session()->has('sukses'))
    <div id="flash" data-flash="{{ $message }}"></div>
@endif
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><span class="material-icons">menu</span></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="/logout" method="post">
          @csrf
          <button class="btn btn-white" type="submit">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layout/sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<script>
  var flash = $('#flash').data('flash');
  if (flash) {
  Swal.fire({
    icon: 'success',
    title: 'Data Berhasil di Input',
    text: flash
  })
  }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
<!-- optional script -->

@yield('script')

</body>
</html>
