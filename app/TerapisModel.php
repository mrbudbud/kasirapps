<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerapisModel extends Model
{
    protected $table = 'tb_terapis';
    protected $fillable = ['namaTerapis', 'noTelepon', 'alamat', 'email'];
}
