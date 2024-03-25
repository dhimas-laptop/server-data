
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi PL</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- font awesome-->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- google icon -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"   rel="stylesheet">
  <link rel="icon" href="{{ asset('/tdash/images/logo.png') }}">
  <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"/>
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
                        <form class="form-horizontal" method="POST" action="/absenproses" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="text-center"><strong>LAPORAN HARIAN PENDAMPING DAN PENGAWAS LAPANGAN</strong></div>
                            <div class="text-center mb-4">Rehabilitasi Hutan dan Lahan Tahun 2024</div>
                            
                            <div class="form-group row" >
                                <label class="col-sm-2 col-form-label">Nama Pendamping</label>
                                <input type="text" class="col-sm-10 form-control" name="nama">
                            </div>  
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Jenis Pendamping</label>
                              <select class="col-sm-10 form-control" name="jenis">
                                  <option value="PL RHL">PL RHL</option>
                                  <option value="PL KBR">PL KBR</option>
                                  <option value="Pengawas Lapangan">Pengawas lapangan</option>
                              </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lokasi</label>
                                <input type="text" class="col-sm-10 form-control"  name="lokasi">
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Latitude</label>
                                <input type="text" class="col-sm-10 form-control"  name="latitude" id="latitude" readonly>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Longitude</label>
                                <input type="text" class="col-sm-10 form-control"  name="longitude" id="longitude" readonly>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Informasi/ Permasalahan di Lapangan</label>
                                <textarea class="col-sm-10 form-control" rows="3" name="informasi"></textarea>
                            </div>  
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <input type="date" class="col-sm-10 form-control"  name="tanggal" >
                            </div>  
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Upload Foto (Geotagging)</label>
                                <div class="custom-file">
                                    <input type="file" class="col-sm-10 custom-file-input" name="gambar[]" multiple>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Upload file Tracking GPX</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar[]" style="70%" multiple>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div> 
                            <div id="map"></div>
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
    
    <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
<!-- optional script -->
<script src="{{ asset('js/added/sweetalert2.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
          bsCustomFileInput.init();
        });
    </script>

<script>
    $(document).ready(function() { 
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        
        alert('Your device is not support!');
        }

	function showPosition(data) {
		document.getElementById('latitude').value = data.coords.latitude
        document.getElementById('longitude').value = data.coords.longitude
		
		var map = L.map("map").setView(
			[data.coords.latitude, data.coords.longitude],
			13
		);

		L.tileLayer(
			"https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
				maxZoom: 18,
				id: "mapbox/streets-v11",
				tileSize: 512,
				zoomOffset: -1,
			}
		).addTo(map);

		L.marker([
			data.coords.latitude, data.coords.longitude
		])
			.addTo(map)
			.bindPopup("Location");
	}
});
	
</script>
    
    @include('layout/alert')
    </body>
</html>

