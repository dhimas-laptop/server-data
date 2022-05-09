@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content') <div class = "content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Perjalanan Dinas</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-right mx-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-1"><i class="nav-icon fa-solid fa-plus"></i></button>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="/perjalanan-dinas/download"><i class="nav-icon fa-solid fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                 <tr>
                                    <th class="align-middle text-center">Nama Pelaksana</th>
                                    <th class="align-middle text-center">No.Telp</th>
                                    <th class="align-middle text-center">NO SPT dan Tanggal</th>
                                    <th class="align-middle text-center">NO SP2D dan Tanggal</th>
                                    <th class="align-middle text-center">Tujuan</th>
                                    <th class="align-middle text-center">Tanggal Berangkat</th>
                                    <th class="align-middle text-center">Tanggal Kembali</th>
                                    <th class="align-middle text-center">Total SPJ</th>
                                    <th class="align-middle text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spd as $spd)
                                <tr>
                                <td>{{ $spd->user->name }}</td>
                                <td>{{ $spd->user->no_telp }}</td>
                                <td><a href="/perjalanan-dinas/{{ $spd->id }}">{{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}</a></td>
                                <td>@if ($spd->nomor_spd == null)
                                    
                                     @else
                                     {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
                                     @endif
                                </td>
                                <td>{{ $spd->tujuan }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
                                <!-- <td>{{ $spd->uang_harian }}</td>
                                <td>{{ $spd->pesawat }}</td>
                                <td>{{ $spd->no_pesawat }}</td>
                                <td>{{ $spd->no_tiket }}</td>
                                <td>{{ $spd->kode_booking }}</td>
                                <td>{{ $spd->harga }}</td>
                                <td>{{ $spd->taxi }}</td>
                                <td>{{ $spd->nama }}</td>
                                <td>{{ $spd->harga_penginapan }}</td>
                                <td>{{ $spd->no_telp }}</td>
                                <td>{{ $spd->provinsi }}</td>-->
                                <td>{{ $spd->total }}</td> 
                                <td>
                                    <a class="btn btn-success" href="/perjalanan-dinas/update/{{ $spd->id }}"><i class="nav-icon fa-regular fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger" href="/perjalanan-dinas/hapus/{{ $spd->id }}"><i class="nav-icon fa-solid fa-trash-can"></i></a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<!-- /.content -->
</div>

<!-- /.modal -->
      <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="/perjalanan-dinas/proses-tambah" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <input type="text" class="col-sm-10 form-control" style="text-transform: uppercase" name="nomor_spt">
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <input type="date" class="col-sm-10 form-control" name="tgl_spt">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <input type="text" class="col-sm-10 form-control" style="text-transform: uppercase" name="tujuan">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berangkat</label>
                        <input type="date" class="col-sm-10 form-control" name="berangkat">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pulang</label>
                        <input type="date" class="col-sm-10 form-control" name="pulang">
                    </div>
                    <div class="form-group row align-middle">    
                        <label class="col-sm-2 col-form-label">Pegawai Pelaksana</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="user_id[]" placeholder="Pilih karyawan">
                        @foreach ($user as $spd)
                        <option value="{{ $spd->id }}">{{$spd->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="input-group">
                        <label class="col-sm-2 col-form-label">Bukti Perjalanan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar[]" multiple>
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                     
                    
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>                    
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
      </div>
      

@endsection 

@section('script')

<!-- DataTables & Plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
       
    } );
    $('#example1').DataTable( {
       
    } );
    $('#example2').DataTable( {
       
    } );
} );
</script>
<script>
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>


@endsection