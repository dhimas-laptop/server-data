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
                <div class="float-right">
                    <a class="btn btn-secondary" href="/matriks/download"><i class="nav-icon fa-solid fa-download"></i> Download</a>
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
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/matriks/filter">
                            @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Bulan</label>
                                <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih karyawan">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                                </select>
                            <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-search"></i> Cari</button>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Bulan</label>
                                <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih karyawan">
                                
                                <option value=""></option>
                                
                                </select>
                            <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-search"></i> Cari</button>
                        </div>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                 <tr>
                                    <th class="align-middle text-center">No</th>
                                    @for ($i = 0; $i < 31; $i++)
                                    <th class="align-middle text-center">{{$i}}</th>    
                                    @endfor
                                </tr>
                            </thead>
                            <tbody> 
                               <tr>
                                 @for ($i = 0; $i < 32; $i++)   
                                 <td class="align-middle text-center">asdasdasd{{$i}}</td>  
                                 @endfor
                               </tr>
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
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script src="{{asset('js/added/rupiah.js')}}"></script>

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable( {
      
        "scrollX": true,
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

    $('[data-mask]').inputmask()
 })
</script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
<script>
    $('#cek').change(function () { 
    if('#cek:checked') {
        $('#value').attr('value', '');
        $('#lain').show();
        $('#pegawai').hide();
        $('#cek').attr('disabled', 'disabled');
        $('#value').attr('value', ''); 
    }
    });
</script>

@endsection