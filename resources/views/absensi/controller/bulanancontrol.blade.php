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
                    <div class="col">
                      <h1>Data Laporan Bulanan Pengawas Lapangan</h1>
                    </div>
                    @can('admin')
                    <div class="float-right">
                        <a class="btn btn-secondary" href="#"><i class="nav-icon fa-solid fa-download"></i> Download</a>
                    </div> 
                    @endcan
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
                                            <th>Lokasi</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>total</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($bulanan as $data)
                                          <tr>
                                            <th>{{ $no++ }}</th>
                                            <th>{{ $data->nama }}</th>
                                            <th>{{ $data->lokasi }}</th>
                                            <th>{{ $data->kelurahan }}</th>
                                            <th>{{ $data->kecamatan }}</th>
                                            <th>{{ $data->total }}</th>
                                            {{-- <th>
                                            @if (!is_null($data->gambarlaporan))
                                                @foreach ($data->gambarlaporan as $gambar)
                                                <img src="{{asset('gambarlaporan/'.$gambar->gambar)}}" height="100px" width="200px">
                                                @endforeach
                                            @endif
                                            </th> --}}
                                            <th>{{ $data->jenis }}</th>
                                            <th>
                                                <a type="button" class="btn btn-block btn-info btn-flat" href="/bulananPL/detail/{{$data->id}}"><i class="fa-solid fa-circle-info"></i>Detail</a>
                                                <button class="btn btn-block btn-default btn-flat" href="#"><i class="fa-regular fa-circle-down"></i>Download</button>
                                            </th>
                                          </tr>
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                          <th>No</th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>total</th>
                                            <th>Jenis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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
            rowReorder: {
              selector: 'td:nth-child(2)'
            },
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