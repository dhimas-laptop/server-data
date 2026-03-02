@extends('layout.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Satker</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">DATA PEJABAT PENANDATANGAN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="display">
                  <thead>
                  <tr>
                    <th>Kementerian</th>
                    <th>Eselon</th>
                    <th>Lokasi</th>
                    <th>Satker</th>
                    <th>Alamat</th>
                    <th>DIPA</th>
                    <th>Tanggal DIPA</th>
                  </tr>
                  </thead>
                  

                  <tfoot>
                  <tr>
                    <th>Kementerian</th>
                    <th>Eselon</th>
                    <th>Lokasi</th>
                    <th>Satker</th>
                    <th>Alamat</th>
                    <th>DIPA</th>
                    <th>Tanggal DIPA</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

    <!-- tambah data -->
    @can('admin')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah data</h3>
              </div>
              <!-- /.card-header -->
              <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kementerian</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama kementerian bukan singkatan" id="kementerian">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Eselon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="nama eselon 1" id="eselon">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="provinsi wilayah kerja " id="lokasi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Satuan Kerja</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Nama satuan kerja" id="satker">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="alamat tempat satker berkedudukan" id="alamat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NO. DIPA</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="ex: DIPA-029.04.2.693571/2025" id="dipa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TGL. DIPA</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" placeholder="tanggal dipa awal terbit" id="tgl_dipa">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" id="store">Submit</button>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Hapus data</h3>
              </div>
                <!-- /.card-header -->
                <div class="form-horizontal">
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">No Dipa</label>
                      <div class="col-sm-10">
                        <select class="form-control select2bs4" style="width: 100%;" id="idSatker">
                          <option id="option" value=""></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="delete">Submit</button>
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
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
<script>
    var table = new DataTable('#example', {
        ajax: '/spj-online/data-dataSatker',
        columns: [
          { data: 'kementerian' },
          { data: 'eselon' },
          { data: 'lokasi' },
          { data: 'satker' },
          { data: 'alamat' },
          { data: 'dipa' },
          { data: 'tgl_dipa'},
      ],
      scrollX: true
    });

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
            let kementerian   = $('#kementerian').val();
            let eselon = $('#eselon').val();
            let lokasi = $('#lokasi').val();
            let satker   = $('#satker').val();
            let alamat = $('#alamat').val();
            let dipa = $('#dipa').val();
            let tgl_dipa = $('#tgl_dipa').val();    
          
            // ajax
            $.ajax({

                url: `/spj-online/tambahSatker`,
                type: "POST",
                cache: false,
                data: {
                    "kementerian"   : kementerian,
                    "eselon"        : eselon,
                    "lokasi"        : lokasi,
                    "satker"        : satker,
                    "alamat"        : alamat,
                    "dipa"          : dipa,
                    "tgl_dipa"      : tgl_dipa,
                },
                success:function(response){

                    //show success message
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    $.ajax({
                          type: "GET",
                          url: "/spj-online/data-dataSatker",
                          data: "{}",
                          success: function (data) {
                              var s = '<option value="-1">harap pilih nama</option>';
                              for (var i = 0; i < data.data.length; i++) {
                                  s += '<option value="' + data.data[i].id + '">' + data.data[i].dipa + '</option>';
                              }
                              $("#idttd").html(s);
                          }
                      });
                      
                        
                      
                    table.ajax.reload();
                    
                },
                error:function(error){
                    Swal.fire({
                    title: "Gagal",
                    text: "ada data yang belum terisi",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 2000
                  });
                  

                }

            });
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

            //define variable
            let idSatker   = $("#idSatker").val();
            // ajax
            $.ajax({

                url: `/spj-online/hapusSatker`,
                type: "POST",
                cache: false,
                data: {
                    "id" : idSatker
                },
                success:function(response){

                    //show success message
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    //reload option
                    const select = document.getElementById('idSatker');
                    function getOptionByValue(select, value) {
                        const options = select.options;
                        for (let i = 0; i < options.length; i++) {
                            if (options[i].value === value) {
                                return options[i];
                            }
                        }
                        return null;
                    }
                    const optionToRemove = getOptionByValue(select, idSatker);
                    if (optionToRemove) {
                        select.removeChild(optionToRemove);
                    }

                    //reload datatable
                    table.ajax.reload();
                    
                },
                error:function(error){
                    Swal.fire({
                    title: "Gagal",
                    text: `${error}`,
                    icon: "error",
                    showConfirmButton: false,
                    timer: 2000
                  });
                }

            });
        }
      });
    });

    $(document).ready(function () {
      $.ajax({
          type: "GET",
          url: "/spj-online/data-dataSatker",
          data: "{}",
          success: function (data) {
              var s = '<option value="-1">Pilih DIPA</option>';
              for (var i = 0; i < data.data.length; i++) {
                  s += '<option value="' + data.data[i].id + '">' + data.data[i].dipa + '</option>';
              }
              $("#idSatker").html(s);
          }
      });
    });
</script>

@endsection