@extends('layout.master')

@section('css')
@endsection

@section('content')
<!-- Content Header (Page header) -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- tambah data -->
    @can('admin')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Umum Perjadin</h3>
              </div>
              <!-- /.card-header -->
              <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Satuan Kerja</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="" id="id_satker" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. SPT</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="ex: ST.xx/BPDAS.SJD/xx/PEG.3/1/2025" id="no_spt">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal SPT</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="tanggal diterbitkannya Surat Tugas" id="tgl_spt">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mata Anggaran Keluaran (MAK)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Akun yang digunakan dalam perjadin ex: 5403.EBA.962.051.A.524111/RM" id="mak">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="rangka melakukan perjalanan dinas" id="keperluan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Keberangkatan</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="tanggal keberangkatan SPT " id="tgl_brgkt">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Kepulangan</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="Tanggal Kepulangan SPT" id="tgl_plg">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal di-SPJ-kan</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="Tanggal Pembuatan SPJ biasanya setelah SPT selesai" id="tgl_spj">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pejabat Pembuat Komitmen</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4" style="width: 100%;" id="idttd">
                        <option id="option" value=""></option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="store">Kunci</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
      

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Data Pelaksana Perjalanan Dinas</h3>
              </div>
              <!-- /.card-header -->
              <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah Pelaksana</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" placeholder="Jumlah peserta yang mengikuti perjalanan dinas (khusus pegawai yang terdaftar di sipuda)" id="no_sppd">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pelaksana</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4" style="width: 100%;" id="id_user">
                        <option id="option1" value=""></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. SPPD</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nomor yang untuk visum sesuai dengan pelaksana" id="no_sppd">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal SPPD</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="tanggal nomor visum" id="tgl_sppd">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="store">Kunci</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    @endcan

</div>
@endsection 

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();
        
        Swal.fire({
          title: "Konfirmasi data anda",
          text: "apakah data yang diisi sudah benar?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, sudah benar!"
        }).then((result) => {
          if (result.isConfirmed) {

            //define variable
           
          
        }
      });
    });

    //action delete post
    $('#delete').click(function(e) {
        e.preventDefault();
        
        Swal.fire({
          title: "Konfirmasi hapus data",
          text: "apakah anda yakin mau menghapus data?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, yakin!"
        }).then((result) => {
          if (result.isConfirmed) {
        
          }
        });
    });

    // $(document).ready(function () {
    //   $.ajax({
    //       type: "GET",
    //       url: "/spj-online/data-dataSatker",
    //       data: "{}",
    //       success: function (data) {
    //           var s = '<option value="-1">Pilih DIPA</option>';
    //           for (var i = 0; i < data.data.length; i++) {
    //               s += '<option value="' + data.data[i].id + '">' + data.data[i].dipa + '</option>';
    //           }
    //           $("#idSatker").html(s);
    //       }
    //   });
    // });
</script>

@endsection