@extends('layout.master')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>

@endsection
@section('content') <div class = "content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-right mx-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg"><i class="nav-icon fa-solid fa-plus"></i></button>
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
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $user)
                            
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->no_telp }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a class="btn btn-success" href="/Pengguna/update/{{ $user->id }}"><i class="nav-icon fa-regular fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger" href="/Pengguna/hapus/{{ $user->id }}"><i class="nav-icon fa-solid fa-trash-can"></i></a>
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
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="Pengguna/tambah">
                @csrf
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <input type="text" class="col-sm-10 form-control" name="name">
                  </div>  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIP</label>
                    <input type="text" class="col-sm-10 form-control" name="nip">
                </div>  
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <input type="email" class="col-sm-10 form-control" name="email" value="example@gmail.com">
                </div>  
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <input type="password" class="col-sm-10 form-control" name="password">
                </div>  
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No Telepon</label>
                    <input type="text" class="col-sm-10 form-control" name="no_telp" value="081231231231">
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Bagian</label>
                    <select class="col-sm-10 form-control" name="role" placeholder="Pilih Bagian">
                    <option value="user">User</option>
                    <option value="ev">Evaluasi</option>
                    <option value="prog">Seksi Program</option>
                    <option value="rhl">RHL</option>
                    <option value="tu">Tata Usaha</option>
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

@endsection @section('script')

<!-- DataTables & Plugins -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

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
@endsection