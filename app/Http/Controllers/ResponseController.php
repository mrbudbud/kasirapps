<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function response ($sukses, $msg) {
        return $response = [
            'action' => true,
            'sukses' => $sukses,
            'msg' => $msg
        ];
    }
}
