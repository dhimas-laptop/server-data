@extends('../../layout/master')
{{-- css tambahan --}}
@section('css')
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"/>
    
@endsection
{{-- css tambahan selesai --}}

{{-- isi content --}}
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Data Bibit BPDAS Sei Jang Duriangkang</h1>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-outline-primary float-sm-right" type="button" data-toggle="modal" data-target="#modal-lg">
                            <i class="fa-solid fa-plus-circle"></i> Tambah Data Bibit
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th style="width:20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($data['data'] as $datas => $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data['nama'] }}</td>
                                            <td>{{ $data['jenis'] }}</td>
                                            <td>{{ $data['jumlah'] }}</td>
                                            <td>
                                              <button class="btn btn-outline-info" type="button" data-toggle="modal" data-target="#modal-lg"><i class="fa-solid fa-pencil-square"></i>Update</button>
                                              <a href="/bibit/hapus/{{ $data['id']}}" id="confirm" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Daftar Bibit</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="/bibit/tambah-bibit">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bibit</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Bibit" name="nama">
                              </div>
                              <div class="form-group">
                                <label>Pilih Jenis</label>
                                <select class="form-control select2" style="width: 100%;" name="jenis">
                                    <option selected="selected">Pilih Jenis</option>
                                    <option value="Bibit Produktif">Bibit Produktif</option>
                                    <option value="Bibit Berkualitas">Bibit Berkualitas</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Jumlah</label>
                                <input type="number" class="form-control" placeholder="Jumlah Bibit" name="jumlah">
                              </div>
                            </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
                  </div>          
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>   
              <div id="status"></div>
        </section>
    </div>

    
@endsection
{{-- content selesai --}}

{{-- javascript tambahan --}}
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
   
@endsection
{{-- javascript tambahan selesai --}}