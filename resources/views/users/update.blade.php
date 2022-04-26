@extends('../layout/master')

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
            <h5 class="text-center">UPDATE DATA PEGAWAI</h5>
         </div>
         <form class="form-horizontal" action="/pegawai/update-proses" method="POST"> 
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="nip">
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="name">
                </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="no_telp">
              </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="password">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" onclick="history.back();" class="btn btn-default">Kembali</button>
            <button type="submit" class="btn btn-info  float-right">Simpan</button>
          </div>
          <!-- /.card-footer -->
        </form>
     </div>
   </div>
</section>
</div>
@endsection 
                            
@section('script')



@endsection