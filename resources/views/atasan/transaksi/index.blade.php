@extends('layouts.atasanLayout')


@section('main_content')

<section class="content">
<div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
    <div class="card">
        <div class="card-header">
          <div>
            <h3 class="card-title">
                Data Transaksi Hari Ini
            </h3>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>Id Transaksi</th>
                  <th>Barang / Jasa</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                  <th>Potongan</th>
                  <th>Total</th>
                  <th>Terapis</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $datas as $data)
              <tr>
                <td>{{ $data->idTransaksi }}</td>
                <td>{{ $data->namaProduk }}</td>
                <td>{{ $data->jumlahBeli }}</td>
                <td>{{ $data->harga * $data->jumlahBeli }}</td>
                <td>{{ $data->potongan }}</td>
                <td>{{ $data->total }}</td>
                <td>{{ $data->namaTerapis }}</td>
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
@endsection