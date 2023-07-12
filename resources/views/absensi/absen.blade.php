
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
    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="">
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<style>
    html, body {
        height: 100%;
        margin: 0;
    }
    .leaflet-container {
        height: 400px;
        width: 750px;
        max-width: 100%;
        max-height: 100%;
    }
</style>

</head>
<body>
    <header class="p-3 text-bg-custom" style="background: lightgreen">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><img src="https://bibit.bpdas-sjd.id/img/logo.png" alt="AdminLTE Logo" width="40px" height="40px" style="opacity: .8">
                <span class="brand-text font-weight-light" >BPDAS Sei Jang Duriangkang</span></li>
            </ul>
    
          </div>
        </div>
      </header>

        <section class="container ">
        <div class="row p-lg-5">
            <div class="col-lg-10 mx-auto my-auto">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/order-bibit">
                            <input type="hidden" name="_token" value="l3lSzsiu314auCfBSa8NBA3LhQQLRFpYSzNMwPSJ">
                            
                            <div class="text-center"><strong>LAPORAN HARIAN PENDAMPING DAN PENGAWAS LAPANGAN</strong></div>
                            <div class="text-center mb-4">Rehabilitasi Hutan dan Lahan Tahun 2023</div>
                            
                            <div class="form-group row" >
                                <label class="col-sm-2 col-form-label">Nama Pendamping</label>
                                <input type="text" class="col-sm-10 form-control" name="nama">
                            </div>  
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Jenis Pendamping</label>
                              <select class="col-sm-10 form-control" name="jenis">
                                  <option value="perorangan">PL RHL</option>
                                  <option value="kelompok">PL KBR</option>
                                  <option value="kelompok">Pengawas lapangan</option>
                              </select>
                          </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lokasi Penugasan</label>
                                <input type="text" class="col-sm-10 form-control"  name="lokasi" >
                            </div>  
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Lokasi Kunjungan</label>
                              <input type="text" class="col-sm-10 form-control"  name="lokasi" >
                          </div>    
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Informasi/ Permasalahan di Lapangan</label>
                                <textarea class="col-sm-10 form-control" rows="3"></textarea>
                            </div>  
                            
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" onclick="window.history.back()">kembali</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://bibit.bpdas-sjd.id/vendor/fontawesome/js/all.min.js"></script>
    <script src="https://bibit.bpdas-sjd.id/vendor/adminlte/js/adminlte.min.js"></script>
    <script src="https://bibit.bpdas-sjd.id/added/sweetalert2.min.js"></script>
    
    
    </body>
</html>

