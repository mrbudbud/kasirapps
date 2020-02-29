<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    protected $table ='tb_barang';

    protected $fillable = ['kategori','jenisProduk', 'namaProduk', 'quantity', 'satuan', 'harga', 'stock'];

}
