<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    //terhubung ke
    protected $table = 'tb_customer';

    protected $fillable = ['namaLengkap', 'alamat', 'tanggalLahir', 'nomorHp', 'email'];


}
