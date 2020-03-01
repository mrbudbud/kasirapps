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
                Tambah Data Costumer
                </button>
            </h3>
            <div class="card-tools pull-right">
                <form action="{{ route('cariCustomerKasir') }}" method="get">
                @csrf
                <div class="input-group input-group-md">
                    <input placeholder="Nama Customer" name="keyword" type="text" class="form-control">
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
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>No HP/WA</th>
                    <th>Email</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $datas as $data)
                    <tr>
                    <td>{{ $data -> namaLengkap }}</td>
                    <td>{{ $data -> alamat }}</td>
                    <td>{{ $data -> tanggalLahir }}</td>
                    <td>{{ $data -> nomorHp }}</td>
                    <td>{{ $data -> email }}</td>
                    <td>
                        <a href="{{ route('formEditCustomerKasir', $data->idCustomer) }}" class="btn btn-warning">Edit</a>
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
            <h4 class="modal-title">Tambah Data Costumer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{route('insertCustomerKasir')}}" method="post">
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
                        <input name="namaLengkap" type="text" class="form-control" placeholder="Nama Lengkap">
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
                        <input name="alamat" type="text" class="form-control" placeholder="Alamat">
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
                        <input name="tanggalLahir" type="date" class="form-control" placeholder="Tanggal Lahir">
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
                        <input name="nomorHp" type="number" class="form-control" placeholder="Nomor HP/WA">
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
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data Costumer</button>
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