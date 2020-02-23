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
                  <h3 class="card-title">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-default">
                    Tambah Data Costumer
                    </button></h3>
                </div>
                  <br>
                <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Lengkap</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Tanggal Lahir</th>
                          <th scope="col">No HP/WA</th>
                          <th scope="col">Email</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                        @foreach( $tb_customer as $datas)
                      <tbody>
                        <tr>
                          <th scope="row">{{ $loop -> iteration}}</th>
                          <td>{{ $datas -> namaLengkap }}</td>
                          <td>{{ $datas -> alamat }}</td>
                          <td>{{ $datas -> tanggalLahir }}</td>
                          <td>{{ $datas -> nomorHp }}</td>
                          <td>{{ $datas -> email }}</td>
                          <td><a href="#" class="btn btn-success">Edit</a>
                              <a href="#" class="btn btn-danger">Hapus</a></td>
                        </tr>
                      </tbody>
                        @endforeach
                  </table>
                </div>

                    <!-- /.modal tambah data costumer -->
                    <div class="modal fade" id="modal-default">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Costumer</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                  <form action="(" method="POST">
                                    @csrf
                                    <div class="container-fluid">
                                    <div class="col-12">
                                    <div>
                                      <label for="">Nama Lengkap</label>
                                    </div>
                                    <div class="input-group mb-3">
                                      <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-user"></span>
                                        </div>
                                      </div>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap">
                                      </div>
                                      <div>
                                        <label for="">Alamat</label>
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-map-marked-alt"></span>
                                          </div>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Alamat">
                                      </div>
                                      <div>
                                        <label for="">Tanggal Lahir</label>
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fa fa-calendar"></span>
                                          </div>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Tanggal Lahir">
                                      </div>
                                      <div>
                                        <label for="">Nomor HP/WA</label>
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-address-card"></span>
                                          </div>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nomor HP/WA">
                                      </div>
                                      <div>
                                        <label for="">Email</label>
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-append">
                                          <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                          </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary">Simpan Data Costumer</button>
                                  </div>
                                </form>
                          </div>
                          
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

            </div>
        </div>
      </div>    
    </div>
</section>
@endsection