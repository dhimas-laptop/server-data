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
         
         <form class="form-horizontal" action="#" method="POST"> 
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
                <label class="col-sm-2 col-form-label">Kode Kegiatan</label>
                <select class="col-sm-10 custom-select" name="kode" disabled>
                    <option>---Pilih kode---</option>
                    <option value="FD.6738.RAG" @if ($spd->kode === "FD.6738.RAG") selected @endif>FD.6738.RAG</option>
                    <option value="FF.5407.RBK" @if ($spd->kode === "FF.5407.RBK") selected @endif >FF.5407.RBK</option>
                    <option value="FF.6734.REA" @if ($spd->kode === "FF.6734.REA") selected @endif >FF.6734.REA</option>
                    <option value="FF.6735.QDB" @if ($spd->kode === "FF.6735.QDB") selected @endif >FF.6735.QDB</option>
                    <option value="FF.6735.UAB" @if ($spd->kode === "FF.6735.UAB") selected @endif >FF.6735.UAB</option>
                    <option value="FF.6736.REA" @if ($spd->kode === "FF.6736.REA") selected @endif >FF.6736.REA</option>
                    <option value="FF.6737.QDB" @if ($spd->kode === "FF.6737.QDB") selected @endif >FF.6737.QDB</option>
                    <option value="FF.6737.REA" @if ($spd->kode === "FF.6737.REA") selected @endif >FF.6737.REA</option>
                    <option value="WA.5403.EBA" @if ($spd->kode === "WA.5403.EBA") selected @endif >WA.5403.EBA</option>
                </select>
              </div> 
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total SPJ</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @if($spd->total===null) is-invalid @endif" value="{{ $spd->total }}" name="total" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kriteria uang yang diterima</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @if($spd->jenis===null) is-invalid @endif" value="{{ $spd->jenis }}" name="jenis" disabled>
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
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SPM</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control @if($spd->no_spm===null) is-invalid @endif" value="{{ $spd->no_spm }}" name="no_spm" disabled>
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