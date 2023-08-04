<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibit Gratis</title>

    <link rel="stylesheet" href="https://bibit.bpdas-sjd.id/vendor/adminlte/css/adminlte.min.css">
    <link href="https://bibit.bpdas-sjd.id/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="https://bibit.bpdas-sjd.id/added/sweetalert2.min.css" rel="stylesheet"/>
</head>
<body>
    <header class="p-3 text-bg-custom" style="background: lightgreen">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" width="40px" height="40px" style="opacity: .8">
                <span class="brand-text font-weight-light" onclick="route('/')">Absensi dan laporan PL dan Pengawas</span></li>
            </ul>
    
          </div>
        </div>
      </header>
            <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <p>
                    <a href="/absensiPL" class="btn btn-secondary my-2">Absensi PL dan Pengawas</a>
                    <a href="/laporan-bulanan" class="btn btn-success my-2">Laporan Bulanan Pengawas</a>
                </p>
                </div>
            </div>
            </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="{{ asset('vendor/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('vendor/adminlte/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('added/sweetalert2.min.js')}}"></script>
</body>
</html>

