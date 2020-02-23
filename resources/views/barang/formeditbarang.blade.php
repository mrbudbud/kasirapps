@extends('layouts.master')

@section('header_content')
    <a class="nav-link">Table Barang</a>
@endsection

@section('main_content')

<section class="content">
  <div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Edit Data Barang
          </h3>
        </div>
        <div class="card-body no-padding">
          <form action="{{ route('updateBarang', $data->idProduk) }}" method="POST">
              @csrf
              <div class="container-fluid">
              <div class="col-12">
              <div>
                <label for="">Jenis Produk</label>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-append">
                  <div class="input-group-text">
                  </div>
                </div>
                <select name="jenisProduk" class="form-control"> jenis
                  <option selected value="{{ $data->jenisProduk }}">{{ $data->jenisProduk }}</option>
                  <option value="V LINE (VITA ADVANCED)">V Line (Vita Advanced)</option>
                  <option value="W LINE (WHITE GLOW)">W LineE (White Glow)</option>
                  <option value="TRAVEL KIT">Travel Kit</option>
                  <option value="SMART SKIN CREAM">Smart Skin Cream</option>
                </select>
                  {{-- <input value="{{ $data->jenisProduk }}" name="jenisProduk" type="text" class="form-control" placeholder="Jenis Produk"> --}}
                </div>
                <div>
                  <label for="">Nama Produk</label>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                    </div>
                  </div>
                  <input value="{{ $data->namaProduk }}" name="namaProduk" type="text" class="form-control" placeholder="Nama Produk">
                </div>
                <div>
                  <label for="">Quantity</label>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                    </div>
                  </div>
                  <input value="{{ $data->quantity }}" name="quantity" type="number" class="form-control" placeholder="Quantity">
                </div>
                <div>
                  <label for="">Harga</label>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                    </div>
                  </div>
                  <input value="{{ $data->harga }}" name="harga" type="number" class="form-control" placeholder="Harga">
                </div>
                <div>
                  <label for="">Stock</label>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <div class="input-group-text">
                    </div>
                  </div>
                  <input value="{{ $data->stock }}" name="stock" type="number" class="form-control" placeholder="Stock">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('tampilBarang') }}">
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