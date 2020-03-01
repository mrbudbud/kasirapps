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
          <div>
            <h3 class="card-title">
                Data Bonus Harian
            </h3>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
                <tr>
                  <th>Nama Terapis</th>
                  <th>Nomor Telp</th>
                  <th>E-Mail</th>
                  <th>Jumlah Transaksi</th>
                  <th>Total Transaksi</th>
                  <th>Bonus Hari Ini</th>
                </tr>
            </thead>
            <tbody>
              @foreach( $datas as $data)
                <tr>
                  <td>{{ $data['dataTerapis']['namaTerapis'] }}</td>
                  <td>{{ $data['dataTerapis']['noTelepon'] }}</td>
                  <td>{{ $data['dataTerapis']['email'] }}</td>
                  <td>{{ $data['jumlahTransaksi'] }}</td>
                  <td>Rp. {{ number_format($data['total'], 0, '.', '.') }},-</td>
                  <td>Rp. {{ number_format($data['bonus'], 0, '.', '.') }},-</td>
                </tr>
              @endforeach
            </body>
          </table>
          <br>
          <a href="{{ route('sendMail') }}">
            <button type="button" class="btn btn-warning">Kirim E-Mail Terapis</button>
          </a>
        </div>
    </div>
    </div>
</div>  
</section>
@endsection