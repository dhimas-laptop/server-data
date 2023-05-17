@extends('../layout/master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/> 

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
            <h5 class="text-center">UPDATE DATA SPJ</h5>
         </div>
         
         <form class="form-horizontal" action="/perjalanan-dinas/update-proses/524113" method="POST"> 
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
              <label class="col-sm-2 col-form-label">Kode Kegiatan</label>
              <select class="col-sm-10 custom-select" name="kode">
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
                <input type="text" id="rupiah" class="form-control" value="{{ $spd->total }}" name="total">
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
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor SPM</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $spd->no_spm }}" style="text-transform: uppercase" name="no_spm">
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

</div>
@endsection 
                            
@section('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{asset('js/added/rupiah.js')}}"></script>
<script>
  // Customization example
  Fancybox.bind('[data-fancybox="gallery"]', {
    infinite: false,
    buttons: [
            "zoom",
            "slideShow",
            "thumbs",
            "close",
            "delete" //this is the name of my custom button
        ],
        btnTpl: {
            //and this is where I defined it
            delete:
                '<a download data-fancybox-delete class="fancybox-button fancybox-button--delete" title="Delete" href="#">' +
                '<i class="fas fa-trash-alt"></i>' +
                "</a>"
        }
  });
</script>
 <script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>

@endsection