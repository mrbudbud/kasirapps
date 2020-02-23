@extends('layouts.master')


@section('main_content')

<section class="content">
  <div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          @if(session('action'))
            @if(session('sukses'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('msg') }}
              </div>
            @else
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('msg') }}
              </div>
            @endif
          @endif
          <h3 class="card-title">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Tambah Barang
            </button>
          </h3>
          <div class="card-tools pull-right">
            <form action="{{ route('cariBarang')}}" method="get">
              @csrf
              <div class="input-group input-group-md">
                <input placeholder="Nama Barang" name="keyword" type="text" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-info btn-flat">Cari</button>
                    </span>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
          <table class="table table-hover">
              <thead>
                <tr>
                  <th>JENIS PRODUK</th>
                  <th>NAMA PRODUK</th>
                  <th>QUANTITY (ml)</th>
                  <th>HARGA</th>
                  <th>STOCK</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $datas as $data)
                <tr>
                  <td>{{ $data -> jenisProduk }}</td>
                  <td>{{ $data -> namaProduk }}</td>
                  <td>{{ $data -> quantity }} ml</td>
                  <td>Rp. {{ $data -> harga }},-</td>
                  <td>{{ $data -> stock }}</td>
                  <td>
                    <a href="{{ route('formEditBarang', $data->idProduk)}}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('deleteBarang', $data->idProduk) }}">
                      <button class="btn btn-danger" onclick="return konfirmasi()">Hapus</button>
                    </a>
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>
          {{ $datas->links() }}
        </div>
      </div>
    </div>
  </div>  
</section>

<!-- /.modal tambah data costumer -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('insertBarang') }}" method="POST">
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
                    <option value="">Pilih Jenis Produk</option>
                    <option value="V LINE (VITA ADVANCED)">V Line (Vita Advanced)</option>
                    <option value="W LINE (WHITE GLOW)">W LineE (White Glow)</option>
                    <option value="TRAVEL KIT">Travel Kit</option>
                    <option value="SMART SKIN CREAM">Smart Skin Cream</option>
                  </select>
                  </div>
                  <div>
                    <label for="">Nama Produk</label>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      </div>
                    </div>
                    <input name="namaProduk" type="text" class="form-control" placeholder="Nama Produk">
                  </div>
                  <div>
                    <label for="">Quantity</label>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      </div>
                    </div>
                    <input name="quantity" type="number" class="form-control" placeholder="QUANTITY">
                  </div>
                  <div>
                    <label for="">Harga</label>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      </div>
                    </div>
                    <input name="harga" type="number" class="form-control" placeholder="HARGA">
                  </div>
                  <div>
                    <label for="">Stock</label></label>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <div class="input-group-text">
                      </div>
                    </div>
                    <input name="stock" type="number" class="form-control" placeholder="stock">
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
              </div>
            </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection