@extends('layouts.atasanLayout')


@section('main_content')

<section class="content">
<div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
    <div class="card">
        <div class="card-header">
          <div>
            <h3 class="card-title">
                Data Transaksi {{ $bulan . ' ' .$tahun }} 
            </h3>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>Id Transaksi</th>
                  <th>Barang / Jasa</th>
                  <th>Potongan</th>
                  <th>Metode Pembayaran</th>
                  <th>Terapis</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                  <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $datas as $data)
              <tr>
                <td>{{ $data->idTransaksi }}</td>
                <td>{{ $data->namaProduk }}</td>
                <td>{{ $data->potongan }}</td>
                <td>{{ $data->metodePembayaran }}</td>
                <td>{{ $data->namaTerapis === null ? '-' : $data->namaTerapis }}</td>
                <td>{{ $data->jumlahBeli }}</td>
                <td>Rp. {{ number_format($data->harga * $data->jumlahBeli, '0', '.', '.') }},-</td>
                <td align="right">Rp. {{ number_format($data->total, '0', '.', '.') }},-</td>
              </tr>
            @endforeach
            <tr>
                <td colspan="7" align="center">Total Transaksi</td>
                <td align="right">Rp. {{ number_format($totalKeseluruhan, '0', '.', '.') }},-</td>
              </tr>
            </tbody>
        </table>
        {{ $datas->links() }}
        </div>
    </div>
    </div>
</div>  
</section>
@endsection