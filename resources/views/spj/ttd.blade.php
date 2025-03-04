@extends('layout.master')

@section('css')
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

                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="Pengguna/tambah">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <input type="text" class="col-sm-10 form-control" name="name">
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIP</label>
                                    <input type="text" class="col-sm-10 form-control" name="nip">
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <input type="email" class="col-sm-10 form-control" name="email" value="example@gmail.com">
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <input type="password" class="col-sm-10 form-control" name="password">
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No Telepon</label>
                                    <input type="text" class="col-sm-10 form-control" name="no_telp" value="081231231231">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bagian</label>
                                    <select class="col-sm-10 form-control" name="role" placeholder="Pilih Bagian">
                                    <option value="ev">Evaluasi</option>
                                    <option value="prog">Seksi Program</option>
                                    <option value="rhl">RHL</option>
                                    <option value="tu">Tata Usaha</option>
                                    </select>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection 

@section('script')

@endsection