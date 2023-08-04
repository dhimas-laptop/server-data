
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengawas</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- font awesome-->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- google icon -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"   rel="stylesheet">
  <link rel="icon" href="{{ asset('/tdash/images/logo.png') }}">
  <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"/>

</head>
<body>
    <header class="p-3 text-bg-custom" style="background: lightgreen">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><img src="https://bibit.bpdas-sjd.id/img/logo.png" alt="AdminLTE Logo" width="40px" height="40px" style="opacity: .8">
                <span class="brand-text font-weight-light" >BPDAS Sei Jang Duriangkang</span></li>
            </ul>
    
          </div>
        </div>
      </header>

        <section class="container ">
        <div class="row p-lg-5">
            <div class="col-lg-10 mx-auto my-auto">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="/laporanproses" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="text-center"><strong>LAPORAN BULANAN PENGAWAS LAPANGAN</strong></div>
                            <div class="text-center mb-4">RHL 300 Ha Mangsang</div>
                            
                            <div class="form-group row" >
                                <label class="col-sm-2 col-form-label">Nama<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control" name="nama">
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lokasi<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="lokasi" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">koordinat<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="koordinat" >
                            </div>  
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">luas<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="luas" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">DAS<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="das" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="kelurahan" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="kecamatan" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kota<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="kota" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total bibit yang ada dipersemaian (perkiraan)<span style="color: red">*</span></label>
                                <input type="number" class="col-sm-10 form-control"  name="total" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Bibit<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="jenis" >
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kondisi Bibit di Persemaian<span style="color: red">*</span></label>
                                <input type="text" class="col-sm-10 form-control"  name="lokasi" >
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Jumlah dan jenis bibit Sesuai Rancangan ?<span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question1" value="Ada/Sesuai">
                                    <label class="form-check-label">Ada/Sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question1" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak Sesuai/Tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Sertifikat/keterangan asal usul bibit? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question2" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question2" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Lokasi penanaman sesuai dengan peta perencanaan? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question3" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question3" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Tersedianya batas lokasi penanaman? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question4" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question4" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Pola RHL sesuai dengan rancangan? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question5" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question5" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Penyulaman tanaman mati dengan tanaman baru yang seumur? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question6" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question6" value="tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Kondisi tanah gembur? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question7" value="iya/sesuai">
                                    <label class="form-check-label">Iya/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question7" value="tidak">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Tanaman terbebas dari tanaman pengganggu? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question8" value="iya/sesuai">
                                    <label class="form-check-label">iya/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question8" value="tidak">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Jenis pupuk sesuai dengan rancangan? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question9" value="iya">
                                    <label class="form-check-label">Iya</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question9" value="tidak">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Jumlah pupuk yang diberikan per tanaman sesuai? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question10" value="iya">
                                    <label class="form-check-label">Iya</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question10" value="tidak">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-form-label">Tersedianya laporan akhir hasil penilaian P2 dilengkapi dokumentasi geotagg pada petak ukur penilaian? <span style="color: red">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question11" value="Ada/sesuai">
                                    <label class="form-check-label">Ada/sesuai</label>
                                </div>    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question11" value="Tidak ada/tidak Sesuai">
                                    <label class="form-check-label">Tidak ada/tidak Sesuai</label>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <label class="col-form-label">Progress Ketersediaan Bahan Penanaman Rehabilitasi Hutan dan Lahan<span style="color: red">*</span></label>
                                <table class="table-bordered">
                                    <tr>
                                        <th></th>
                                        <th class="bg-navy text-center"><div>Target Volume</div></th>
                                        <th class="bg-navy text-center"><div>Capaian s.d bulan lalu</div></th>
                                        <th class="bg-navy text-center"><div>Capaian bulan ini</div></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pengadaan pupuk kandang dan NPK</div></th>
                                        <td><input type="number" class="form-control"  name="pupuk1" ></td>
                                        <td><input type="number" class="form-control"  name="pupuk2" ></td>
                                        <td><input type="number" class="form-control"  name="pupuk3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pengadaan hidrogel</div></th>
                                        <td><input type="number" class="form-control"  name="hidrogel1" ></td>
                                        <td><input type="number" class="form-control"  name="hidrogel2" ></td>
                                        <td><input type="number" class="form-control"  name="hidrogel3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Bibit tanaman sulaman</div></th>
                                        <td><input type="number" class="form-control"  name="sulam1" ></td>
                                        <td><input type="number" class="form-control"  name="sulam2" ></td>
                                        <td><input type="number" class="form-control"  name="sulam3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pengadaan Dolomit</div></th>
                                        <td><input type="number" class="form-control"  name="dolomit1" ></td>
                                        <td><input type="number" class="form-control"  name="dolomit2" ></td>
                                        <td><input type="number" class="form-control"  name="dolomit3" ></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Progress Kemajuan Pelaksanaan Rehabilitasi Hutan dan Lahan<span style="color: red">*</span></label>
                                <table class="table-bordered">
                                    <tr>
                                        <th></th>
                                        <th class="bg-navy text-center"><div>Target Volume</div></th>
                                        <th class="bg-navy text-center"><div>Capaian s.d bulan lalu</div></th>
                                        <th class="bg-navy text-center"><div>Capaian bulan ini</div></th>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Penyiangan</div></th>
                                        <td><input type="number" class="form-control"  name="penyiangan1" ></td>
                                        <td><input type="number" class="form-control"  name="penyiangan2" ></td>
                                        <td><input type="number" class="form-control"  name="penyiangan3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pendangiran</div></th>
                                        <td><input type="number" class="form-control"  name="pendangiran1" ></td>
                                        <td><input type="number" class="form-control"  name="pendangiran2" ></td>
                                        <td><input type="number" class="form-control"  name="pendangiran3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pemupukan</div></th>
                                        <td><input type="number" class="form-control"  name="pemupukan1" ></td>
                                        <td><input type="number" class="form-control"  name="pemupukan2" ></td>
                                        <td><input type="number" class="form-control"  name="pemupukan3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Penyulaman</div></th>
                                        <td><input type="number" class="form-control"  name="penyulaman1" ></td>
                                        <td><input type="number" class="form-control"  name="penyulaman2" ></td>
                                        <td><input type="number" class="form-control"  name="penyulaman3" ></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-navy text-center"><div>Pemberantasan hama penyakit</div></th>
                                        <td><input type="number" class="form-control"  name="pemberantasan1" ></td>
                                        <td><input type="number" class="form-control"  name="pemberantasan2" ></td>
                                        <td><input type="number" class="form-control"  name="pemberantasan3" ></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi di lokasi penanaman<span style="color: red">*</span></label>
                                <textarea class="col-sm-10 form-control" rows="3" name="problem1"></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi saat penanaman<span style="color: red">*</span></label>
                                <textarea class="col-sm-10 form-control" rows="3" name="problem2"></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi dalam distribusi bibit<span style="color: red">*</span></label>
                                <textarea class="col-sm-10 form-control" rows="3" name="problem3"></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Saran<span style="color: red">*</span></label>
                                <textarea class="col-sm-10 form-control" rows="3" name="problem4"></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm col-form-label">Foto Dokumentasi Lapangan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar[]" style="70%" multiple>
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" onclick="window.history.back()">kembali</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
<!-- optional script -->
<script src="{{ asset('js/added/sweetalert2.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
    
    @include('layout/alert')
    </body>
</html>

