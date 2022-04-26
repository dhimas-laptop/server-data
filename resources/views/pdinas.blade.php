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
                <div class=" col-sm-2 float-right">
                    <button type="button" class="btn btn-info btn-block btn-flat align-middle" data-toggle="modal" data-target="#modal-1">
                        Tambah Data
                      </button>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="/perjalanan-dinas/detail"><i class="nav-icon fa-solid fa-download"></i></a>
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
                                <td>{{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}</td>
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
                <form class="form-horizontal" method="POST" action="/perjalanan-dinas/proses-tambah">
                    @csrf
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Surat</label>
                        <input type="text" class="col-sm-10 form-control" name="nomor_spt">
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <input type="date" class="col-sm-10 form-control" name="tgl_spt">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <input type="text" class="col-sm-10 form-control" name="tujuan">
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
                    <div class="form-group row align-middle">    
                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <select class="form-control col-sm-10" name="bagian_id" placeholder="Pilih karyawan">
                        @foreach ($bagian as $spd)
                        <option value="{{ $spd->id }}">{{ $spd->nama_bagian }}</option>
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
      
      <!--------------------------------- Modal Dialog unduh ------------------------------>
      <div class="modal fade" id="modal-2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="/perjalanan-dinas/unduh">
                    @csrf
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Pelaksana</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="user_id[]" placeholder="Pilih karyawan">
                        @foreach ($user as $spd)
                        <option value="{{ $spd->id }}">{{$spd->name}}</option>
                        @endforeach
                    </select>  
                    </div>  
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Nomor SPT</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="no_spt[]" placeholder="Pilih karyawan">
                        @foreach ($nomor_spt as $spd)
                        <option value="{{ $spd->nomor_spt }}">{{$spd->nomor_spt}}</option>
                        @endforeach
                    </select>  
                    </div>
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Tanggal SPT</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="tgl_spt[]" placeholder="Pilih karyawan">
                        @foreach ($tgl_spt as $spd)
                        <option value="{{ $spd->tgl_spt }}">{{ date('d-m-Y', strtotime($spd->tgl_spt))}}</option>
                        @endforeach
                    </select>  
                    </div> 
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Nomor SP2D</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="no_spd[]" placeholder="Pilih karyawan">
                        @foreach ($nomor_spd as $spd)
                        <option value="{{ $spd->nomor_spd }}">{{$spd->nomor_spd}}</option>
                        @endforeach
                    </select>  
                    </div>
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Tanggal SP2D</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="tgl_spd[]" placeholder="Pilih karyawan">
                        @foreach ($tgl_spd as $spd)
                        <option value="{{ $spd->tgl_spd }}">{{date('d-m-Y', strtotime($spd->tgl_spd))}}</option>
                        @endforeach
                    </select>  
                    </div>
                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Tujuan</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="tujuan[]" placeholder="Pilih karyawan">
                        @foreach ($tujuan as $spd)
                        <option value="{{ $spd->tujuan }}">{{$spd->tujuan}}</option>
                        @endforeach
                    </select>  
                    </div>

                    <div class="form-group row align-middle fieldGroup">    
                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" name="bagian[]" placeholder="Pilih karyawan">
                        @foreach ($user as $spd)
                        <option value="{{ $spd->name }}">{{ $spd->name }}</option>
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
<!--------------------------------- /.Modal Dialog unduh ------------------------------>
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


<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
       
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



@endsection