@extends('layouts.master')

@section('header_content')
    <a class="nav-link">Table Costumer</a>
@endsection

@section('main_content')

<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>Isi Data Costumer</h3>
                    </div>
                    <br>

                    <form action="">
                        <div class="container-fluid">
                        <div class="col-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Alamat">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marked-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="Tanggal Lahir">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fa fa-calendar"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Nomor HP/WA">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-8">
                              <div class="icheck-primary">
                                <label for="agreeTerms">

                                </label>
                              </div>
                            </div>
                            <!-- /.col -->
                            <div class="container col-8">
                              <button type="submit" class="btn btn-primary btn-block">Tambah Costumer</button>
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>
                    </div>
<br>
                    </form>

                </div>
            </div>
        </div>    
    </div>
</section>
@endsection