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
                    <a class="btn btn-secondary" value="
                    @if ($active === 'tanggal')
                    tanggal
                    @endif
                    @if ($active === 'bulan')
                    bulan
                    @endif
                    @if ($active === 'tahun')
                    tahun
                    @endif
                    " href="/perjalanan-dinas/download"><i class="nav-icon fa-solid fa-download"></i> Download</a>
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
            <div class="col-lg-12">
                @if($active === 'tanggal')
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/perjalanan-dinas/tanggal">
                            @csrf
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pilih Tanggal</label>
                        <input type="date" class="col-sm-3 form-control" name="filter"> 
                        <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-search"></i> Cari</button>
                        </form>    
                    </div>
                    </div>
                </div>
                @endif
                @if($active === 'bulan')
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/perjalanan-dinas/bulan">
                            @csrf
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pilih Bulan</label>
                        <select class="form-control select2bs4" style="width:50%;" name="filter1" placeholder="Pilih karyawan">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>                            
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                       </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Tahun</label>
                            <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih karyawan">
                            @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->tgl_spt }}">{{$tahun->tgl_spt}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <button class="btn btn-info" type="submit"><i class="nav-icon fas fa-search"></i> Cari</button>
                        </div>
                        </form>
                    </div>
                </div>
                @endif
                @if($active === 'tahun')
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/perjalanan-dinas/tahun">
                            @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Tahun</label>
                            <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih karyawan">
                            @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->tgl_spt }}">{{ $tahun->tgl_spt }}</option>
                            @endforeach
                            </select>
                            <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-search"></i> Cari</button>
                        </div>
                        </form>
                    </div>
                </div>
                @endif
                
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                 <tr>
                                    <th class="align-middle text-center">No</th>
                                    <th class="align-middle text-center">Nama Pelaksana</th>
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
                                <td>{{ $no++ }}</td>
                                <td>{{ $spd->user->name }}</td>
                                <td><a href="/perjalanan-dinas/{{ $spd->id }}">{{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}</a></td>
                                <td>@if ($spd->nomor_spd == null)
                                    
                                     @else
                                     {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
                                     @endif
                                </td>
                                <td>{{ $spd->tujuan }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
                                <td>{{ $spd->total }}</td> 
                                <td>
                                    <div class="row">
                                      <div class="col-2">
                                        <a class="btn btn-success" href="/perjalanan-dinas/update/{{ $spd->id }}"><i class="nav-icon fa-regular fa-edit"></i></a>
                                        @can('admin')
                                        <a class="btn btn-danger" id="confirm" href="/perjalanan-dinas/hapus/{{ $spd->id }}"><i class="nav-icon fa-solid fa-trash-can"></i></a>
                                        @endcan 
                                      </div>
                                    </div>
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
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="/perjalanan-dinas/proses-tambah" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor SPT</label>
                        <input type="text" class="col-sm-10 form-control  @error('nomor_spt') is-invalid @enderror" style="text-transform: uppercase" name="nomor_spt" placeholder="Masukkan data ">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal SPT</label>
                        <input type="date" class="col-sm-3 form-control  @error('tgl_spt') is-invalid @enderror" name="tgl_spt" placeholder="Masukkan Nomor SPT">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <input type="text" class="col-sm-10 form-control  @error('tujuan') is-invalid @enderror" style="text-transform: uppercase" name="tujuan" placeholder="Masukkan Tujuan ">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berangkat</label>
                        <input type="date" class="col-sm-3 form-control  @error('berangkat') is-invalid @enderror" name="berangkat">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pulang</label>
                        <input type="date" class="col-sm-3 form-control  @error('pulang') is-invalid @enderror" name="pulang">
                    </div>
                    <div class="form-group row">    
                        <label class="col-sm-2 col-form-label">Pegawai Pelaksana</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="user_id[]">
                        @foreach ($user as $spd)
                        <option value="{{ $spd->id }}">{{$spd->name}}</option>
                        @endforeach
                    </select>
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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
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