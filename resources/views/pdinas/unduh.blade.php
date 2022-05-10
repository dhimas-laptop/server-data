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
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th class="align-middle text-center" rowspan="2">Nama Pelaksana</th>
                                <th class="align-middle text-center" rowspan="2">No.Telp</th>
                                <th class="align-middle text-center" rowspan="2">SPT dan Tanggal</th>
                                <th class="align-middle text-center" rowspan="2">NO SP2D dan Tanggal</th>
                                <th class="align-middle text-center" rowspan="2">Tujuan</th>
                                <th class="align-middle text-center" rowspan="2">Tanggal Berangkat</th>
                                <th class="align-middle text-center" rowspan="2">Tanggal Kembali</th>
                                <th class="align-middle text-center" rowspan="2">Uang Harian</th>
                                <th class="align-middle text-center" colspan="6">Transportasi</th>
                                <th class="align-middle text-center" colspan="4">Hotel/Penginapan</th>
                                <th class="align-middle text-center" rowspan="2">Total SPJ</th>
                            </tr>
                            <tr>
                                <th class="align-middle text-center">Pesawat/Kapal</th>
                                <th class="align-middle text-center">No Penerbangan</th>
                                <th class="align-middle text-center">No Tiket</th>
                                <th class="align-middle text-center">Kode Booking</th>
                                <th class="align-middle text-center">Harga</th>
                                <th class="align-middle text-center">Taxi</th>
                                <th class="align-middle text-center">Nama</th>
                                <th class="align-middle text-center">Harga</th>
                                <th class="align-middle text-center">No. Telp</th>
                                <th class="align-middle text-center">Provinsi</th>
                            </tr> 
                            </thead>
                            <tbody>
                                @foreach ($spd as $spd)
                                <tr>
                                <td>{{ $spd->user->name }}</td>
                                <td>{{ $spd->user->no_telp }}</td>
                                <td>@if($spd->nomor_spt!==null)
                                    {{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}
                                    @endif</td>
                                <td>@if($spd->nomor_spd!==null)
                                    {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
                                    @endif
                                </td>
                                <td>{{ $spd->tujuan }}</td>
                                <td>{{ $spd->berangkat }}</td>
                                <td>{{ $spd->pulang }}</td>
                                <td>{{ $spd->uang_harian }}</td>
                                <td>{{ $spd->pesawat }}</td>
                                <td>{{ $spd->no_pesawat }}</td>
                                <td>{{ $spd->no_tiket }}</td>
                                <td>{{ $spd->kode_booking }}</td>
                                <td>{{ $spd->harga }}</td>
                                <td>{{ $spd->taxi }}</td>
                                <td>{{ $spd->nama }}</td>
                                <td>{{ $spd->harga_penginapan }}</td>
                                <td>{{ $spd->no_telp }}</td>
                                <td>{{ $spd->provinsi }}</td>
                                <td>{{ $spd->total }}</td>
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
