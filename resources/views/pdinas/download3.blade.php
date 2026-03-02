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
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="/perjalanan-dinas/downloadfilter524113">
                        @csrf
                        
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pilih SPT</label>
                        <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih SPT">
                        @foreach ($spd as $spd)
                        <option value="{{ $spd }}">{{ $spd }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <button class="btn btn-info" type="submit"><i class="nav-icon fas fa-download"></i> Download</button>
                    </div>
                </form>
                  </div>
                </div>
            </div>
        </div>
        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@can('admin')
    
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="/perjalanan-dinas/downloadfilter524113">
                        @csrf
                        
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pilih SPT</label>
                        <select class="form-control select2bs4" style="width:50%;" name="filter1" placeholder="Pilih SPT">
                        @foreach ($tahun as $tahun)
                        <option value="{{ $tahun->tgl_spt }}">{{ $tahun->tgl_spt }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <button class="btn btn-info" type="submit"><i class="nav-icon fas fa-download"></i> Download</button>
                    </div>
                </form>
                  </div>
                </div>
            </div>
        </div>
        
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endcan
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


<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
      "scrollX": true,
      responsive: true,
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      
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
