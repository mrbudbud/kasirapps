<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\barangModel;
use App\http\Controllers\ResponseController;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tb_barang = barangModel::paginate(6);
        return view('barang.index')->with(['datas' => $tb_barang ]);
    }

    public function cari(Request $request){
        $tb_barang = barangModel::where([
            ['namaProduk', 'LIKE', $request->get('keyword') . '%']
        ])->paginate(6);
        $hasil = $tb_barang->appends ( array('keyword' => $request->input('keyword')));
        return view('barang.index')->with(['datas' => $hasil]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //input
        $responseController = new responseController();
        $response;
        $insert = barangModel::create($request->all());
        if ($insert) {
            $response = $responseController->response(true, 'Berhasil Input Barang');
        } else {
            $response = $responseController->response(true, 'Gagal Input Barang');
        }
        // var_dump($response);
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit barang
        $tb_barang = barangModel::where('idProduk', $id)->first();
        return view('barang.formeditbarang')->with(['data' => $tb_barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update barang
        $data = $request->all();
        var_dump($data);
        unset($data['_token']);
        $update = barangModel::where('idProduk', $id)
                ->update($data);
        $responseController = new ResponseController();
        $response;
        if ($update) {
            $response = $responseController->response(true, 'Berhasil Update Barang');
        } else {
            $response = $responseController->response(false, 'Gagal Update Barang');
        }
        // var_dump($response);
        return redirect()->route('tampilBarang')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = barangModel::where('idProduk', $id)->delete();
        $responseController = new ResponseController();
        $response;
        if ($delete) {
            $response = $responseController->response(true, 'Berhasil Hapus data Produk');
        } else {
            $response = $responseController->response(true, 'Gagal Hapus Data Produk');
        }
        return redirect()->route('tampilBarang')-> with($response);

    }
}
