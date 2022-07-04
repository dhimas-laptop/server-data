@extends('../layout/master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>   
@endsection
@section('content')
<!-- Content Header (Page header) -->

<div class="content-wrapper">
<!-- Content Header (Page header) -->
@can('admin')
<section class="content">
  <div class="container-fluid">
    <div class="row">
            <!-- left column -->
      <div class="col-md-12 my-5">
                <!-- general form elements -->
        <div class="card card-primary mx-5">
          <div class="card-header">
            <h5 class="text-center">UPDATE DATA SPJ</h5>
         </div>
         
         <form class="form-horizontal" action="/perjalanan-dinas/update-proses" method="POST"> 
            @csrf
          <div class="card-body">
            <input type="text" class="form-control" value="{{ $spd->id }}" name="id" hidden>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SPT</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $spd->nomor_spt }}" style="text-transform: uppercase" name="no_spt" >
              </div>
            </div>
             <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal SPT</label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" value="{{ $spd->tgl_spt }}" name="tgl_spt" >
              </div>
             </div>
             <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SP2D</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" value="{{ $spd->nomor_spd }}" style="text-transform: uppercase" name="no_spd">
                </div>
             </div>
             <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal SP2D</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" value="{{ $spd->tgl_spd }}" name="tgl_spd">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->tujuan }}" style="text-transform: uppercase" name="tujuan" >
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Berangkat</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" value="{{ $spd->berangkat }}" name="berangkat" >
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" value="{{ $spd->pulang }}" name="pulang" >
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Uang Harian</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{ $spd->uang_harian }}" name="uang_harian">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Pesawat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->pesawat }}" style="text-transform: uppercase" name="pesawat">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Penerbangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->no_penerbangan }}" style="text-transform: uppercase" name="no_penerbangan">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Tiket</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->no_tiket }}" style="text-transform: uppercase" name="no_tiket">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Booking</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->kode_booking }}" style="text-transform: uppercase" name="kode_booking">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Pesawat</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{ $spd->harga_pesawat }}" style="text-transform: uppercase" name="harga_pesawat">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Taxi</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{ $spd->taxi }}" name="taxi">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Hotel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->hotel }}" style="text-transform: uppercase" name="hotel">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Hotel</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{ $spd->harga_hotel }}" name="harga_hotel">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->no_telp }}" name="no_telp">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->provinsi }}" style="text-transform: uppercase" name="provinsi">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total SPJ</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" value="{{ $spd->total }}" name="total">
                </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" onclick="history.back();" class="btn btn-default">Kembali</button>
            
            <button type="submit" class="btn btn-info align-content-center float-right">Simpan</button>

          </div>
          <!-- /.card-footer -->
        </form>
     </div>
   </div>
</section>
@endcan

<section class="content">
  <div class="container-fluid">
    <div class="row">
            <!-- left column -->
      <div class="col-md-12 my-5">
                <!-- general form elements -->
        <div class="card card-primary mx-5">
          <div class="card-header">
            <h5 class="text-center">UPLOAD BUKTI SPJ</h5>
          </div>
          
        {{-- isi data --}}
        <form class="form-horizontal" action="/perjalanan-dinas/update-bukti" method="POST">
          @csrf
          <div class="card-body">
                <a href="/bukti/{{ $spd->scan }}">Bukti.pdf</a>              
          <div class="row">
           @foreach ($spd->gambar as $key) 
            <div class="col-sm-4 my-2">   
              <div class="position-relative">
                <button data-fancybox="gallery" data-src="{{ asset('bukti/'.$key->gambar) }}">
                  <img src="{{ asset('bukti/'.$key->gambar) }}" alt="Photo 1" class="img-fluid">
                </button>
              </div>  
            </div>  
              @endforeach   
            </div>                
          </div>
        </form>
        {{-- selesai --}}
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

@endsection