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
            <h3>Pilih Rentang Waktu</h3>
          </div>
          <div class="card-body">
            <form action="/curah-hujan/filter-curah-hujan" method="POST">
              @csrf
            <input type="date" name="sop">
            <input type="date" name="eop">
            <input type="number" name="group">
            <button type="submit">Filter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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