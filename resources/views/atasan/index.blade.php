    @extends('layouts.atasanLayout')


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
            <div class="">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                Tambah Terapis
                </button>
            </h3>
            </div>
            <div class="card-tools pull-right">
                <form action="{{ route('cariTerapis')}}" method="get">
                @csrf
                <div class="input-group input-group-md">
                    <input placeholder="Nama nama" name="keyword" type="text" class="form-control">
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
                    <th>Nama</th>
                    <th>Nomor telpon / WA</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $datas as $data)
                    <tr>
                    <td>{{ $data -> namaTerapis }}</td>
                    <td>{{ $data -> noTelepon }}</td>
                    <td>{{ $data -> alamat }}</td>
                    <td>{{ $data -> email }}</td>
                    <td>
                        <a href="{{ route('formEditTerapis', $data->idTerapis)}}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('deleteTerapis', $data->idTerapis) }}">
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

    <!-- /.modal tambah data produk -->
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
        <form action="{{route('insertTerapis') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                    <div class="col-12">
                    <div>
                        <label for="">Nama Terapis</label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                        </div>
                        <input name="namaTerapis" type="text" class="form-control" placeholder="Nama Terapis">
                    </div>
                    <div>
                        <label for="">No Telepon / WA</label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                        </div>
                        <input name="noTelepon" type="number" class="form-control" placeholder="Nomor Telepon / WA">
                    </div>
                    <div>
                        <label for="">Alamat</label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                        </div>
                        <input name="alamat" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div>
                        <label for="">Email</label>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                        </div>
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Terapis</button>
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