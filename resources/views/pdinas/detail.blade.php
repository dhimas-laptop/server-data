@extends('../layout/master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>   
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" /> 
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
         
         <form class="form-horizontal" action="/perjalanan-dinas/update-proses" method="POST"> 
            @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SPT</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @if($spd->nomor_spt===null) is-invalid @endif" value="{{ $spd->nomor_spt }}" name="no_spt"  disabled>
              </div>
            </div>
             <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal SPT</label>
              <div class="col-sm-10">
                  <input type="date" class="form-control @if($spd->tgl_spt===null) is-invalid @endif" value="{{ $spd->tgl_spt }}" name="tgl_spt"  disabled>
              </div>
             </div>
             <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SP2D</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control @if($spd->nomor_spd===null) is-invalid @endif" value="{{ $spd->nomor_spd }}" name="no_spd" disabled>
                </div>
             </div>
             <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal SP2D</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @if($spd->tgl_spd===null) is-invalid @endif" value="{{ $spd->tgl_spd }}" name="tgl_spd" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->tujuan===null) is-invalid @endif" value="{{ $spd->tujuan }}" name="tujuan"  disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Berangkat</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @if($spd->berangkat===null) is-invalid @endif" value="{{ $spd->berangkat }}" name="berangkat"  disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control @if($spd->pulang===null) is-invalid @endif" value="{{ $spd->pulang }}" name="pulang"  disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Uang Harian</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->uang_harian===null) is-invalid @endif" value="{{ $spd->uang_harian }}" name="uang_harian" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Pesawat/Kapal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->pesawat===null) is-invalid @endif" value="{{ $spd->pesawat }}"name="pesawat" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Penerbangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->no_penerbangan===null) is-invalid @endif" value="{{ $spd->no_penerbangan }}" name="no_penerbangan" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Tiket</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->no_tiket===null) is-invalid @endif" value="{{ $spd->no_tiket }}" name="no_tiket" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Booking</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->kode_booking===null) is-invalid @endif" value="{{ $spd->kode_booking }}" name="kode_booking" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Pesawat/Kapal</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->harga_pesawat===null) is-invalid @endif" value="{{ $spd->harga_pesawat }}" name="harga_pesawat" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Transportasi Darat</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->taxi===null) is-invalid @endif" value="{{ $spd->taxi }}" name="taxi" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Hotel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->hotel===null) is-invalid @endif" value="{{ $spd->hotel }}" name="hotel" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Hotel</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->harga_hotel===null) is-invalid @endif" value="{{ $spd->harga_hotel }}" name="harga_hotel" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->no_telp===null) is-invalid @endif" value="{{ $spd->no_telp }}" name="no_telp" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->provinsi===null) is-invalid @endif" value="{{ $spd->provinsi }}" name="provinsi" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total SPJ</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->total===null) is-invalid @endif" value="{{ $spd->total }}" name="total" disabled>
                </div>
              </div>
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
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Bukti Perjalanan Dinas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row mt-4">
                @foreach ($spd->gambar as $key)
                <div class="col-sm-4 my-2">
                  @if (substr($key->gambar,-3) === 'pdf')
                    <a href="/bukti/{{ $key->gambar }}">Bukti.pdf</a>  
                  @else
                  <div class="position-relative">
                    <button data-fancybox="gallery" data-src="{{ asset('bukti/'.$key->gambar) }}">
                      <img src="{{ asset('bukti/'.$key->gambar) }}" alt="Photo 1" class="img-fluid">
                    </button>
                  </div>
                  @endif                  
                </div>
                @endforeach
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
<script type="text/javascript">
  $(document).ready(function(){
      $('.harga').mask("#.##0,00", {reverse: true});
   });
</script>

@endsection