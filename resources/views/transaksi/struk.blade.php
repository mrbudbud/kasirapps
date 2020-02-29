<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Transaksi Berhasil</h1>
  <table class="table table-border">
    <tr>
      <td>Barang / Jasa</td>
      <td>: {{ $barang['namaProduk'] }}</td>
    </tr>
    <tr>
      <td>Harga</td>
      <td>: Rp. {{ number_format($barang['harga'], 0, '.', '.') }},-</td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td>: {{ $transaksi['jumlahBeli'] }}</td>
    </tr>
    <tr>
      <td>Point Digunakan</td>
      <td>: {{ $transaksi['point'] }}</td>
    </tr>
    <tr>
      <td>Point Didapatkan</td>
      <td>: {{ $getPoint }}</td>
    </tr>
    <tr>
      <td>Point Sekarang</td>
      <td>: {{ $sisaPoint }}</td>
    </tr>
    <tr>
      <td>Sub Total</td>
      <td>: Rp. {{ number_format($barang['harga'] * $transaksi['jumlahBeli'], 0, '.', '.') }},-</td>
    </tr>
    <tr>
      <td>Potongan</td>
      <td>: Rp. {{ number_format($transaksi['potongan'], 0, '.', '.') }},-</td>
    </tr>
    <tr>
      <td>Total Biaya</td>
      <td>: Rp. {{ number_format($transaksi['total'], 0, '.', '.') }},-</td>
    </tr>
  </table>
  <h2>Terimakasih</h2>
</body>
</html>
