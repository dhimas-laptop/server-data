@extends('../layout/master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>   
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" /> 
@endsection
@section('content')
<!-- Content Header (Page header) -->

<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
            <!-- left column -->
      <div class="col-md-12 my-5">
                <!-- general form elements -->
        <div class="card card-primary mx-5">
          <div class="card-header">
            <h5 class="text-center">Rincian Data SPJ</h5>
         </div>
         
         <form class="form-horizontal" action="#" method="POST"> 
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->nama===null) is-invalid @endif" value="{{ $data->nama }}" disabled>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->lokasi===null) is-invalid @endif" value="{{ $data->lokasi }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Koordinat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->koordinat===null) is-invalid @endif" value="{{ $data->koordinat }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Luas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->luas===null) is-invalid @endif" value="{{ $data->luas }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">DAS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->das===null) is-invalid @endif" value="{{ $data->das }}" disabled>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->kelurahan===null) is-invalid @endif" value="{{ $data->kelurahan }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->kecamatan===null) is-invalid @endif" value="{{ $data->kecamatan }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->kota===null) is-invalid @endif" value="{{ $data->kota }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Total bibit yang ada dipersemaian (perkiraan)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control @if($data->total===null) is-invalid @endif" value="{{ $data->total }}" disabled>
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Bibit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->jenis===null) is-invalid @endif" value="{{ $data->jenis }}" disabled>
                    </div>
                </div> 
            
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kondisi Bibit di Persemaian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->kondisi===null) is-invalid @endif" value="{{ $data->kondisi }}" disabled>
                    </div>
                </div>  
            
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah dan jenis bibit Sesuai Rancangan?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question1===null) is-invalid @endif" value="{{ $data->question1 }}" disabled>
                    </div>
                </div> 
            
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sertifikat/keterangan asal usul bibit?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question2===null) is-invalid @endif" value="{{ $data->question2 }}" disabled>
                    </div>
                </div> 
             
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lokasi penanaman sesuai dengan peta perencanaan? </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question3===null) is-invalid @endif" value="{{ $data->question3 }}" disabled>
                    </div>
                </div> 
               
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tersedianya batas lokasi penanaman?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question4===null) is-invalid @endif" value="{{ $data->question4 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pola RHL sesuai dengan rancangan?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question5===null) is-invalid @endif" value="{{ $data->question5 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penyulaman tanaman mati dengan tanaman baru yang seumur?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question6===null) is-invalid @endif" value="{{ $data->question6 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kondisi tanah gembur?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question7===null) is-invalid @endif" value="{{ $data->question7 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanaman terbebas dari tanaman pengganggu?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question8===null) is-invalid @endif" value="{{ $data->question8 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis pupuk sesuai dengan rancangan?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question9===null) is-invalid @endif" value="{{ $data->question9 }}" disabled>
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jumlah pupuk yang diberikan per tanaman sesuai?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question10===null) is-invalid @endif" value="{{ $data->question10 }}" disabled>
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tersedianya laporan akhir hasil penilaian P2 dilengkapi dokumentasi geotagg pada petak ukur penilaian?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->question11===null) is-invalid @endif" value="{{ $data->question11 }}" disabled>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-form-label">Progress Ketersediaan Bahan Penanaman Rehabilitasi Hutan dan Lahan</label>
                    <table class="table-bordered">
                        <tr>
                            <th></th>
                            <th class="bg-navy text-center"><div>Target Volume</div></th>
                            <th class="bg-navy text-center"><div>Capaian s.d bulan lalu</div></th>
                            <th class="bg-navy text-center"><div>Capaian bulan ini</div></th>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pengadaan pupuk kandang dan NPK</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->pupuk1}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->pupuk2}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->pupuk3}} disabled></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pengadaan hidrogel</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->hidrogel1}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->hidrogel2}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->hidrogel3}} disabled></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Bibit tanaman sulaman</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->sulam1}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->sulam2}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->sulam3}} disabled></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pengadaan Dolomit</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->dolomit1}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->dolomit2}} disabled></td>
                            <td><input type="number" class="form-control"  value={{ $data->dolomit3}} disabled></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Progress Kemajuan Pelaksanaan Rehabilitasi Hutan dan Lahan</label>
                    <table class="table-bordered">
                        <tr>
                            <th></th>
                            <th class="bg-navy text-center"><div>Target Volume</div></th>
                            <th class="bg-navy text-center"><div>Capaian s.d bulan lalu</div></th>
                            <th class="bg-navy text-center"><div>Capaian bulan ini</div></th>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Penyiangan</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->penyiangan1 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->penyiangan2 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->penyiangan3 }} disabled ></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pendangiran</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->pendangiran1 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pendangiran2 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pendangiran3 }} disabled ></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pemupukan</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->pemupukan1 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pemupukan2 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pemupukan3 }} disabled ></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Penyulaman</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->penyulaman1 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->penyulaman2 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->penyulaman3 }} disabled ></td>
                        </tr>
                        <tr>
                            <th class="bg-navy text-center"><div>Pemberantasan hama penyakit</div></th>
                            <td><input type="number" class="form-control"  value={{ $data->pemberantasan1 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pemberantasan2 }} disabled ></td>
                            <td><input type="number" class="form-control"  value={{ $data->pemberantasan3 }} disabled ></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi di lokasi penanaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->problem1===null) is-invalid @endif" value="{{ $data->problem1 }}" disabled>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi saat penanaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->problem2===null) is-invalid @endif" value="{{ $data->problem2 }}" disabled>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Permasalahan yang dihadapi dalam distribusi bibit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->problem3===null) is-invalid @endif" value="{{ $data->problem3 }}" disabled>
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Saran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @if($data->problem4===null) is-invalid @endif" value="{{ $data->problem4 }}" disabled>
                    </div>
                </div> 
                @foreach ($data->gambarlaporan as $gambar)
                <div class="form-group row">
                    <img src="{{ asset($gambar->gambar) }}" style="height: 50px;width:100px;">
                </div>
                @endforeach
                
            </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" onclick="history.back();" class="btn btn-default">Kembali</button>
          </div>
          <!-- /.card-footer -->
        </form>
     </div>
    </div>
   </div>
  </div>
 </section>
</div>
@endsection 
                            
@section('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      // Customization example
      Fancybox.bind('[data-fancybox="gallery"]', {
        infinite: false
      });
    </script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.harga').mask("#.##0,00", {reverse: true});
   });
</script>

@endsection