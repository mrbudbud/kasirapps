@extends('layouts.atasanlayout')

@section('header_content')
    <a class="nav-link">Table Costumer</a>
@endsection

@section('main_content')

<section class="content">
  <div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Edit Data Customer
          </h3>
        </div>
        <div class="card-body no-padding">
          <form action="{{ route('updateCustomer', $data->idCustomer) }}" method="POST">
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
                  <input value="{{ $data->namaLengkap }}" name="namaLengkap" type="text" class="form-control" placeholder="Nama Lengkap">
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
                  <input value="{{ $data->alamat }}" name="alamat" type="text" class="form-control" placeholder="Alamat">
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
                  <input value="{{ $data->tanggalLahir }}" name="tanggalLahir" type="date" class="form-control" placeholder="Tanggal Lahir">
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
                  <input value="{{ $data->nomorHp }}" name="nomorHp" type="number" class="form-control" placeholder="Nomor HP/WA">
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
                  <input value="{{ $data->email }}" name="email" type="email" class="form-control" placeholder="Email">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('tampilCustomer') }}">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
              </a>
              <button type="submit" class="btn btn-primary">Update Data Costumer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
</section>
@endsection