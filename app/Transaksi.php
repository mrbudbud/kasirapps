<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';

    protected $fillable = ['idTransaksi', 'idProduk', 'idCustomer', 'harga', 'gunakanPoint', 'point', 'potongan', 'jumlahBeli', 'total', 'idTerapis'];
}
