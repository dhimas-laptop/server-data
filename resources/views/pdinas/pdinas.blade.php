@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
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
                
                <div class="float-right mx-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-1"><i class="nav-icon fa-solid fa-plus"></i></button>
                </div>
                
                <div class="float-right">
                    <a class="btn btn-secondary" value="
                    @if ($active === 'tanggal')
                    tanggal
                    @endif
                    @if ($active === 'bulan')
                    bulan
                    @endif
                    @if ($active === 'tahun')
                    tahun
                    @endif
                    " href="/perjalanan-dinas/download"><i class="nav-icon fa-solid fa-download"></i> Download</a>
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
                        <form class="form-horizontal" method="POST" action="/perjalanan-dinas/tahun">
                            @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Tahun</label>
                            <select class="form-control select2bs4" style="width:50%;" name="filter2" placeholder="Pilih karyawan">
                              <option value="{{ date('Y', strtotime(today())) }}">{{ date('Y', strtotime(today())) }}</option>
                              @foreach ($tahun as $tahun)
                              <option value="{{ $tahun->tgl_spt }}">{{ $tahun->tgl_spt }}</option>
                              @endforeach
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
                                    <th class="align-middle text-center">Nama Pelaksana</th>
                                    <th class="align-middle text-center">NO SPT dan Tanggal</th>
                                    <th class="align-middle text-center">NO SP2D dan Tanggal</th>
                                    <th class="align-middle text-center">NO SPM</th>
                                    <th class="align-middle text-center">Tujuan</th>
                                    <th class="align-middle text-center">Tanggal Berangkat</th>
                                    <th class="align-middle text-center">Tanggal Kembali</th>
                                    <th class="align-middle text-center">Nilai yang Dibayarkan</th>
                                    <th class="align-middle text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($spd as $spd)
                                <tr>
                                <td>{{ $no++ }}</td>
                                <td>@if ($spd->nama_lain != null)
                                    {{ $spd->nama_lain}} 
                                @else
                                    {{ $spd->user->name }}
                                @endif
                                    </td>
                                <td><a href="/perjalanan-dinas/{{ $spd->id }}">{{ $spd->nomor_spt }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spt)); }}</a></td>
                                <td>@if ($spd->nomor_spd == null)
                                    
                                     @else
                                     {{ $spd->nomor_spd }} tanggal {{ date('d/m/Y', strtotime($spd->tgl_spd)); }}
                                     @endif
                                </td>
                                <td>{{ $spd->no_spm }}</td>
                                <td>{{ $spd->tujuan }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->berangkat)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($spd->pulang)) }}</td>
                                <td>{{ $spd->total }}</td> 
                                <td>
                                    <div class="row">
                                      <div class="col-2">
                                        <a class="btn btn-success" href="/perjalanan-dinas/update/{{ $spd->id }}"><i class="nav-icon fa-regular fa-edit"></i></a>
                                        @can('admin')
                                        <a class="btn btn-danger" id="confirm" href="/perjalanan-dinas/hapus/{{ $spd->id }}"><i class="nav-icon fa-solid fa-trash-can"></i></a> 
                                        @endcan
                                        
                                      </div>
                                    </div>
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
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="/perjalanan-dinas/proses-tambah" enctype="multipart/form-data">
                    @csrf
                    <div align="center">-----------WAJIB Di ISI---------</div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor SPT*</label>
                        <input type="text" class="col-sm-10 form-control  @error('nomor_spt') is-invalid @enderror" style="text-transform: uppercase" name="nomor_spt" placeholder="Masukkan nomor SPT">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal SPT*</label>
                        <input type="date" class="col-sm-3 form-control  @error('tgl_spt') is-invalid @enderror" name="tgl_spt" placeholder="Masukkan Nomor SPT">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tujuan*</label>
                        <input type="text" class="col-sm-10 form-control  @error('tujuan') is-invalid @enderror" style="text-transform: uppercase" name="tujuan" placeholder="Masukkan Tujuan ">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Berangkat*</label>
                        <input type="date" class="col-sm-3 form-control  @error('berangkat') is-invalid @enderror" name="berangkat">
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Kembali*</label>
                        <input type="date" class="col-sm-3 form-control  @error('pulang') is-invalid @enderror" name="pulang">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Kegiatan*</label>
                        <select class="col-sm-10 custom-select" name="kode">
                            <option value=>---Pilih kode---</option>
                            <option value="FF.7275.RBK">FF.7275.RBK</option>
                            <option value="FF.7275.REA">FF.7275.REA</option>
                            <option value="FF.7276.QDB">FF.7276.QDB</option>
                            <option value="FF.7276.UAB">FF.7276.UAB</option>
                            <option value="FF.7277.REA">FF.7277.REA</option>
                            <option value="FF.7278.QDB">FF.7278.QDB</option>
                            <option value="FF.7278.REA">FF.7278.REA</option>
                            <option value="WA.7316.EBA">WA.7316.EBA</option>
                        </select>
                      </div>
                      <div align="center">-----------SELESAI---------</div>
                      <div align="center"><br></div>
                      <div align="center">-----------TENTUKAN NAMA PELAKSANA---------</div>
                      <div class="form-group row" id="pegawai">    
                        <label class="col-sm-2 col-form-label">Pegawai Pelaksana</label>
                        <select class="form-control select2bs4" multiple="multiple" style="width:83%;" id="value" name="user_id[]">
                        @foreach ($user as $spd)
                        <option value="{{ $spd->id }}">{{$spd->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cek">
                        <label class="form-check-label">Pegawai Selain BPDAS ?</label>
                    </div>

                    <div style="display: none" id="lain">
                    <div align="center"><b>Bagi pegawai/personil Selain BPDAS</b><br></div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="nama_lain" placeholder="Masukkan Nama Pelaksana">
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor HP</label>
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="no_lain" placeholder="Masukkan nomor Telepon Pelaksana">
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">KLHK(contoh: BPKH)/Non KLHK(contoh: KPH)</label>
                        
                        <select class="col-sm-8 custom-select" style="width:50%;" name="status_lain">
                            <option value="">-</option>
                            <option value="KLHK">KLHK</option>
                            <option value="Non KLHK">Non KLHK</option>
                        </select>
                      </div>
                    </div>
                    <div align="center">-----------NAMA PELAKSANA selesai---------</div>
                    <div align="center"><br></div>
                    <div align="center">-----------Tambahan(bisa diupdate setelah diinput)---------</div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Uang Harian</label>
                         
                          <input class="col-sm-10 form-control" type="text" id="rupiah" class="form-control" name="uang_harian" placeholder="Masukkan Total uang harian(uang harian dikali jumlah hari)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pesawat/Kapal</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="pesawat" placeholder="Masukkan penyedia penerbangan atau Penyedia kapal bila tidak ada disi (-)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Penerbangan/pelayaran</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="no_penerbangan" placeholder="Masukkan nomor penerbangan sesuai yang ada di tiket bila tidak ada disi (-)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Tiket</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="no_tiket" placeholder="Masukkan nomor tiket bila tidak ada disi (-)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Booking</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="kode_booking" placeholder="Masukkan kode booking bila tidak ada disi (-)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Pesawat/Kapal</label>
                        
                          <input class="col-sm-10 form-control" type="text" id="rupiah1" class="form-control" name="harga_pesawat">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Transportasi Darat</label>
                        
                          <input class="col-sm-10 form-control" type="text" id="rupiah2" class="form-control" name="taxi">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Hotel</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="hotel" placeholder="Masukkan nama Hotel">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Harga Hotel</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" name="harga_hotel" id="rupiah3">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" name="no_telp" placeholder="Masukkan nomor telepon hotel bila tidak ada disi (-)">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Provinsi</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" style="text-transform: uppercase" name="provinsi" placeholder="Masukkan provinsi tempat tugas">
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total SPJ</label>
                        
                          <input class="col-sm-10 form-control" type="text" class="form-control" name="total" id="rupiah4">
                        
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor SP2D</label>
                        <input type="text" class="col-sm-10 form-control  @error('nomor_spd') is-invalid @enderror" style="text-transform: uppercase" name="nomor_spd" placeholder="Masukkan Nomor SP2D ">
                      </div>  
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal SP2D</label>
                        <input type="date" class="col-sm-3 form-control  @error('tgl_spd') is-invalid @enderror" name="tgl_spd" placeholder="Masukkan Nomor SP2D">
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor SPM</label>
                        <input type="text" class="col-sm-10 form-control  @error('nomor_spm') is-invalid @enderror" style="text-transform: uppercase" name="no_spm" placeholder="Masukkan nomor SPM ">
                      </div> 
                    
                      <div align="center">-----------Tambahan Selesai---------</div>
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
        responsive: true,
    });
 });
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
<script type="text/javascript">
  $(document).ready(function() {
      $("#rupiah1, #rupiah2, #rupiah3").keyup(function() {
          var rupiah = $("#rupiah").val();
          var rupiah1  = $("#rupiah1").val();
          var rupiah2 = $("#rupiah2").val();
          var rupiah3 = $("#rupiah3").val();
          var rupiah02 = rupiah.replace("Rp. ","");
          var rupiah12 = rupiah1.replace("Rp. ","");
          var rupiah22 = rupiah2.replace("Rp. ","");
          var rupiah32 = rupiah3.replace("Rp. ","");
          
          var total = parseInt(rupiah02.replace(/\./g,"")) + parseInt(rupiah12.replace(/\./g,"")) + parseInt(rupiah22.replace(/\./g,"")) + parseInt(rupiah32.replace(/\./g,""));
          var hasil = formatRupiah(total, "Rp. ");
          $("#total").val(hasil);
      });
          
          function formatRupiah(angka, prefix){
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            total     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
              separator = sisa ? '.' : '';
              total += separator + ribuan.join('.');
            }

            total = split[1] != undefined ? total + ',' + split[1] : total;
            return prefix == undefined ? total : (total ? 'Rp. ' + total : '');
          }
  });
</script>

@endsection