@extends('../layout/master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>    
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
@endsection
@section('content')
<!-- Content Header (Page header) -->

<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
            <!-- left column -->
      <div class="col-md-12 my-5">
                <!-- general form elements -->
        <div class="card card-primary mx-5">
          <div class="card-header">
            <h5 class="text-center">Rincian Data SPJ</h5>
         </div>
         
         <form class="form-horizontal" action="#" method="POST"> 
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->nama===null) is-invalid @endif" value="{{ $data->nama }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Pendamping</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->jenis===null) is-invalid @endif" value="{{ $data->jenis }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->lokasi===null) is-invalid @endif" value="{{ $data->lokasi }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->tanggal===null) is-invalid @endif" value="{{ $data->tanggal }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Informasi/ Permasalahan di Lapangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->informasi===null) is-invalid @endif" value="{{ $data->informasi }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" id="lt" class="form-control @if($data->latitude===null) is-invalid @endif" value="{{ $data->latitude }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" id="ln" class="form-control @if($data->longitude===null) is-invalid @endif" value="{{ $data->longitude }}" disabled>
                    </div>
                </div>

                <div id="map"></div>
            
                @foreach ($data->gambarpl as $gambar)
                    @if ($gambar->gambar == "pdf")
                    <embed type="application/pdf" src="{{ asset('gambarpl/'.$gambar->gambar) }}" style="height: 350px;width:350px;">
                    @else
                    <img src="{{ asset('gambarpl/'.$gambar->gambar) }}" style="height: 350px;width:350px;">
                    @endif
                @endforeach
                
            </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" onclick="history.back();" class="btn btn-default">Kembali</button>
          </div>
          <!-- /.card-footer -->
        </form>
     </div>
    </div>
   </div>
  </div>
 </section>
</div>
@endsection 
                            
@section('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      // Customization example
      Fancybox.bind('[data-fancybox="gallery"]', {
        infinite: false
      });
    </script>
<script>
    $(document).ready(function() { 
		var lt = document.getElementById('lt').value;
        var ln = document.getElementById('ln').value;
		
		var map = L.map("map").setView(
			[lt, ln],
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
			lt, ln
		])
			.addTo(map)
			.bindPopup("Location");
});
	
</script>


@endsection