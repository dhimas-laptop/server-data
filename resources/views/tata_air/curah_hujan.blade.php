@extends('layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"   rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><strong>Data Curah Hujan Batam</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Timestamp</th>
                <th>Curah Hujan</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($data['data'] as $datas => $data)
              <tr>
                <td>{{ $data['Timestamp'] }}</td>
                <td>{{ $data['Rainmm']}}</td>
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
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><strong>Data Curah Hujan Tanjungpinang</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="myTable1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Timestamp</th>
                <th>Curah Hujan</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($data1['data'] as $datas => $data)
              <tr>
                <td>{{ $data['Timestamp'] }}</td>
                <td>{{ $data['Rainmm']}}</td>
              </tr>    
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
</div>
@endsection

@section('script')

<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
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
 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <script>
     $(document).ready( function () {
     $('#myTable').DataTable();
     $('#myTable1').DataTable();
     } );
 </script>

 @endsection