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
         <div class="card-body">
          <form class="form-horizontal" action="/Pengguna/update-proses" method="POST"> 
            @csrf
          <input type="text" class="form-control" value="{{ $user->id }}" name="id" hidden>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $user->name }}" name="name" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $user->nip }}" name="nip" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $user->no_telp }}" name="no_telp" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $user->email }}" name="email" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Isi Password Lama" name="password" >
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Isi Password Baru" name="password" >
            </div>
          </div>            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" onclick="history.back();" class="btn btn-default">Kembali</button>
            <button type="submit" class="btn btn-info  float-right">Simpan</button>
          </div>
          <!-- /.card-footer -->
          </div>
        </form>
     </div>
   </div>
</section>
</div>
@endsection 
                            
@section('script')



@endsection