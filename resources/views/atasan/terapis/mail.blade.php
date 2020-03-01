<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h2>Rekap Bonus Harian</h2>
  Nama Terapis <b>{{$data['dataTerapis']['namaTerapis']}}</b><br>
  Tanggal {{ date('d M Y - H:i:s') }}<br><br>
  <table border="1" style="border-collapse: collapse;width: 100%;">
    <tr style="padding: 0.25rem;text-align: left;border: 1px solid #ccc;">
      <td>Jasa</td>
      <td>Harga</td>
      <td>Persentase</td>
      <td>Bonus</td>
    </tr>
    @foreach($data['transaksi'] as $d)
      <tr style="padding: 0.25rem;text-align: left;border: 1px solid #ccc;">
        <td>{{ $d['namaProduk'] }}</td>
        <td>{{ $d['harga'] }}</td>
        <td>{{ $d['persentase'] * 100 }} %</td>
        <td align="right">Rp. {{ number_format($d['bonusSatuan'], '0', '.', '.') }},-</td>
      </tr>
    @endforeach
    <tr style="padding: 0.25rem;text-align: left;border: 1px solid #ccc;background: #eee;">
      <td colspan="3" align="center">Total</td>
      <td align="right">Rp. {{ number_format($data['bonus'], '0', '.', '.') }},-</td>
    </tr>
  </table>
  <p>Apabila Terjadi Kesalahan Harap Hubungi Admin.</p>
  <h3>Terimakasih.</h3>
</body>
</html>