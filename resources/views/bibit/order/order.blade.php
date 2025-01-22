@extends('../../layout/master')
{{-- css tambahan --}}
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

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
                                            <th>Kelompok</th>
                                            <th>Nama Pemohon</th>
                                            <th>Kegiatan</th>
                                            <th>Jumlah Bibit</th>
                                            <th>Tanggal</th>
                                            <th>status</th>
                                            <th style="width:100%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($data['data'] as $datas => $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data['kelompok'] }}</td>
                                            <td>{{ $data['nama_pemohon'] }}</td>
                                            <td>{{ $data['kegiatan'] }}</td>
                                            <td>@if (isset($data['order'][0]['total']))
                                              {{ $data['order'][0]['total'] }}
                                              @else 
                                              Data tidak ada
                                            @endif</td>
                                            <td>{{ $data['created_at'] }}</td>
                                            <td style="background-color: 
                                            @if (isset($data['order'][0]['status']))
                                              @if ($data['order'][0]['status'] === "pending")
                                                  yellow
                                              @elseif  ($data['order'][0]['status'] === "selesai")
                                                  green
                                              @elseif ($data['order'][0]['status'] === "proses")
                                                  blue
                                              @elseif ($data['order'][0]['status'] === "ditolak")
                                                  red
                                              @endif
                                            @endif
                                            ">
                                            @if (@isset( $data['order'][0]['status'] ))
                                            {{ $data['order'][0]['status'] }}                                              
                                            @endif
                                            </td>
                                            <td>
                                              @if(isset($data['order'][0]['status']))
                                                @if ($data['order'][0]['status'] === "pending")
                                                <a href="/data-order/proses/{{ $data['id']}}" id="confirm" class="btn btn-outline-primary"><i class="fa-solid fa-rotate"></i> Proses</a>
                                                <a href="/data-order/tolak/{{ $data['id']}}" id="confirm" class="btn btn-outline-danger"><i class="fa-solid fa-rectangle-xmark"></i> Tolak</a>
                                                <a href="/data-order/download/{{ $data['id']}}" class="btn btn-outline-secondary" target="_blank"><i class="fa-solid fa-floppy-disk"></i> Download</a>
                                                @endif @if ($data['order'][0]['status'] === "proses")
                                                <a href="/data-order/selesai/{{ $data['id']}}" id="confirm" class="btn btn-outline-success"><i class="fa-solid fa-square-check"></i> Selesai</a>
                                                <a href="/data-order/download/{{ $data['id']}}" class="btn btn-outline-secondary" target="_blank"><i class="fa-solid fa-floppy-disk"></i> Download</a>
                                                @endif @if ($data['order'][0]['status'] === "selesai")
                                                <a href="/data-order/download/{{ $data['id']}}" class="btn btn-outline-secondary" target="_blank"><i class="fa-solid fa-floppy-disk"></i> Download</a>
                                                @endif 
                                              @endif

                                              
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th>No</th>
                                          <th>Kelompok</th>
                                          <th>Nama Pemohon</th>
                                          <th>Kegiatan</th>
                                          <th>Jumlah Bibit</th>
                                          <th>Tanggal</th>
                                          <th>status</th>
                                          <th style="width:20%">Aksi</th>
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
                        <form class="form-horizontal" method="POST" action="/data-bibit/tambah-bibit" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label>Nama Bibit</label>
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
                                <label>Jumlah</label>
                                <input type="number" class="form-control" placeholder="Jumlah Bibit" name="jumlah">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="img">
                                    <label class="custom-file-label">Choose file</label>
                                  </div>
                                </div>
                              </div>
                              <img id="preview" src="#" alt="your image" style="width: 400px;height: 400px;" hidden/>
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
            </div> 
        </section>
    </div>
   
    
@endsection
{{-- content selesai --}}

{{-- javascript tambahan --}}
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    
    <script>
        $(document).ready(function () {
          var table = $('#table').DataTable( {
            responsive:true,
             
            });
        });
    </script>
    <script>
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').removeAttr('hidden');
                }
                reader.readAsDataURL(input.files[0]);
                }
              }
              
              $("#img").change(function() {
                  readURL(this);
              });
    </script>
    
   
@endsection
{{-- javascript tambahan selesai --}}