<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TerapisModel;
use App\http\Controllers\ResponseController;
use DateTime;

class TerapisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tb_terapis = TerapisModel::paginate(6);
        return view('atasan.index')->with(['datas' => $tb_terapis ]);
    }

    public function cari(Request $request){
        $tb_barang = terapisModel::where([
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
        //input terapis
        $responseController = new responseController();
        $response;
        $insert = TerapisModel::create($request->all());
        if ($insert) {
            $response = $responseController->response(true,'Berhasil Input Terapis');
        } else {
            $response = $responseController->response(true,'Gagal Input Terapis');
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

    public function bonusHarian () {
        $datas = TerapisModel::select('tb_terapis.*', 'tb_transaksi.total')
            ->whereDate('tb_transaksi.created_at', new DateTime)
            ->join('tb_transaksi', 'tb_transaksi.idTerapis', '=', 'tb_terapis.idTerapis')
            ->get()->groupBy('idTerapis')->toArray();
        // return $datas;
        $newData = [];
        foreach ($datas as $data) {
            // var_dump($data);
            $hasil = array();
            $hasil['dataTerapis'] = $data[0];
            $total = 0;
            $jumlahTransaksi = sizeof($data);
            $bonusSatuan = 0;
            $transaksi = array();
            for ($i=0; $i < sizeof($data); $i++) { 
                $total += $data[$i]['total'];
                $persentase;
                if ($i >= 4) {
                    $persentase = 0.05;
                } else {
                    $persentase = 0.025;
                }
                $bonusSatuan += $data[$i]['total'] * $persentase;
                array_push($transaksi, $data[$i]);
                // echo $data[$i]['total'];
            }
            $hasil['bonus'] = $bonusSatuan;
            $hasil['total'] = $total;
            $hasil['jumlahTransaksi'] = $jumlahTransaksi;
            $hasil['transaksi'] = $transaksi;
            array_push($newData, $hasil);
        }
        // return $newData;
        return view('atasan.terapis.bonusharian')->with('datas', $newData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tb_terapis = terapisModel::where('idTerapis', $id)->first();
        return view('atasan.formeditterapis')->with(['data' => $tb_terapis]);
        //
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
        //
        $data = $request->all();
        var_dump($data);
        unset($data['_token']);
        $update = terapisModel::where('idTerapis', $id)
                ->update($data);
        $responseController = new ResponseController();
        $response;
        if ($update) {
            $response = $responseController->response(true, 'Berhasil Update Terapis');
        } else {
            $response = $responseController->response(false, 'Gagal Update Terapis');
        }
        // var_dump($response);
        return redirect()->route('tampilTerapis')->with($response);
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
        $delete = terapisModel::where('idTerapis', $id)->delete();
        $responseController = new ResponseController();
        $response;
        if ($delete) {
            $response = $responseController->response(true, 'Berhasil Hapus data Terapis');
        } else {
            $response = $responseController->response(true, 'Gagal Hapus Data Terapis');
        }
        return redirect()->route('tampilTerapis')-> with($response);
    }
}
