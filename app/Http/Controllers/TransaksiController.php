<?php

namespace App\Http\Controllers;
use App\barangModel;
use App\customerModel;
use App\Transaksi;
use Illuminate\Http\Request;
use Mail;
use App\http\Controllers\ResponseController;
use DateTime;
use Illuminate\Support\Str;
use App\TerapisModel;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBarang = barangModel::all();
        $listMember = customerModel::all();
        $listTerapis = TerapisModel::all();
        return view('transaksi.index')->with([
            'listData' => $listBarang,
            'listMember' => $listMember,
            'listTerapis' => $listTerapis
        ]);
    }

    public function showRekap (Request $request) {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $datas;
        if ($bulan == 0) {
            $datas = Transaksi::whereYear('tb_transaksi.created_at', $tahun)
                        ->join('tb_barang' , 'tb_barang.idProduk', '=', 'tb_transaksi.idProduk')
                        ->paginate(10);
        } else {
            $datas = Transaksi::whereMonth('tb_transaksi.created_at', $bulan)
                        ->whereYear('tb_transaksi.created_at', $tahun)
                        ->join('tb_barang' , 'tb_barang.idProduk', '=', 'tb_transaksi.idProduk')
                        ->paginate(10);
        }
        $totalKeseluruhan = 0;
        foreach ($datas as $data) {
            $totalKeseluruhan += $data['total'];
        }
        $bulanTampil = $this->getBulan($bulan);
        return view('atasan.transaksi.showrekap')->with(['datas' => $datas, 'bulan' => $bulanTampil, 'tahun' => $tahun, 'totalKeseluruhan' => $totalKeseluruhan]);
    }

    public function getBulan ($bulan) {
        $show;
        if ($bulan == 1) {
            $show = 'Januari';
        } else if ($bulan == 2) {
            $show = 'Februari';
        } else if ($bulan == 3) {
            $show = 'Maret';
        } else if ($bulan == 4) {
            $show = 'April';
        } else if ($bulan == 5) {
            $show = 'Mei';
        } else if ($bulan == 6) {
            $show = 'Juni';
        } else if ($bulan == 7) {
            $show = 'Juli';
        } else if ($bulan == 8) {
            $show = 'Agustus';
        } else if ($bulan == 9) {
            $show = 'September';
        } else if ($bulan == 10) {
            $show = 'Oktober';
        } else if ($bulan == 11) {
            $show = 'November';
        } else if ($bulan == 12) {
            $show = 'Desember';
        } else {
            $show = 'Semua Bulan';
        }
        return $show;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summeryThisDay()
    {
        date_default_timezone_set('Asia/Jakarta');
        $datas = Transaksi::whereDate('tb_transaksi.created_at', new DateTime)
                ->select('tb_transaksi.*', 'tb_terapis.namaTerapis', 'tb_barang.namaProduk')
                ->join('tb_barang', 'tb_barang.idProduk', '=', 'tb_transaksi.idProduk')
                ->leftJoin('tb_terapis', 'tb_terapis.idTerapis', '=', 'tb_transaksi.idTerapis')
                ->paginate(10);
        $total = 0;
        foreach ($datas as $data) {
            $total += $data['total'];
        }
        return view('atasan.transaksi.index')->with(['datas' => $datas, 'totalKeseluruhan' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function cekPoint ($id, $totalTransaksi) {
        $dataCustomer = customerModel::where('idCustomer', $id)->first();
        $point = $this->getPointTransaksi($totalTransaksi);
        $finalPoint = 0;
        if ($this->cekExpired($dataCustomer['lastTransaksi'])) {
            $finalPoint = $point + $dataCustomer['point'];
        } else {
            $finalPoint = $point;
        }
        $this->updatePoint($dataCustomer['idCustomer'], $finalPoint);
    }

    public function getPointTransaksi($totalTransaksi) {
        $point = floor($totalTransaksi / 20000);
        return $point;
    }

    public function updatePoint ($id, $point) {
        date_default_timezone_set('Asia/Jakarta');
        customerModel::where('idCustomer', $id)->update([
            'point' => $point,
            'lastTransaksi' => new DateTime()
        ]);
    }

    public function cekExpired ($lastTransaksi) {
        date_default_timezone_set('Asia/Jakarta');
        $last = new DateTime($lastTransaksi);
        $now = new DateTime;
        $hari = date_diff($last, $now);
        return $hari->days > 240 ? false : true;
    }

    public function generateIdTransaksi () {
        return 'TRNS' . Str::random(20);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $gunakanPoint = isset($data['gunakanPoint']) ? $data['gunakanPoint'] : false;

        $dataCustomer = customerModel::where('nomorHp', $data['noTelp'])->first();
        $newData = [
            'idTransaksi' => Str::upper($this->generateIdTransaksi()),
            'idProduk' => $data['idProduk'],
            'idCustomer' => $dataCustomer['idCustomer'],
            'harga' => $data['harga'],
            'gunakanPoint' => isset($data['gunakanPoint']) ? true : false,
            'point' => $data['point'],
            'potongan' => $data['potongan'],
            'jumlahBeli' => isset($data['jumlahBeli']) ? $data['jumlahBeli'] : 1,
            'total' => $data['total'],
            'metodePembayaran' => $data['metodePembayaran'],
            'idTerapis' => isset($data['terapis']) ? $data['terapis'] : null
        ];
        $insert = Transaksi::insert($newData);
        $responseController = new ResponseController();
        $response;
        if ($insert) {
            if ($gunakanPoint) {
                $pointSekarang = $dataCustomer['point'];
                $pointBaru = $pointSekarang - $data['point'];
                $this->updatePoint($dataCustomer['idCustomer'], $pointBaru);
            }
            $dataBarang = barangModel::where('idProduk', $newData['idProduk'])->first();
            if ($dataBarang->kategori === 'Produk') {
                $this->updateStok($dataBarang->idProduk, $dataBarang->stock, $newData['jumlahBeli']);
            }
            // cek point
            $this->cekPoint($dataCustomer['idCustomer'], $data['total']);
            // send mail
            $mail = Mail::send('transaksi.struk', [
                'transaksi' => $newData,
                'barang' => $this->getDataBarang($newData['idProduk']),
                'getPoint' => $this->getPointTransaksi($newData['total']),
                'sisaPoint' => $this->getPointSekarang($dataCustomer['idCustomer'])
            ], function($message) use ($dataCustomer){
                $message->to($dataCustomer['email']);
                $message->subject('Transaksi');
            });
            $response = $responseController->response(true, 'Transaksi Berhasil');
        } else {
            $response = $responseController->response(false, 'Transaksi Gagal');
        }
        
        
        
        // return view('transaksi.struk')->with(['transaksi' => $newData,'getPoint' => $this->getPointTransaksi($newData['total']), 'barang' => $this->getDataBarang($newData['idProduk']),'sisaPoint' => $this->getPointSekarang($dataCustomer['idCustomer'])]);
        
        return redirect()->back()->with($response);
    }

    public function getPointSekarang ($id) {
        $data = customerModel::where('idCustomer', $id)->first();
        return $data['point'];
    }

    public function getDataBarang ($id) {
        return barangModel::where('idProduk', $id)->first()->toArray();
    }

    public function updateStok ($idBarang, $stokSekarang, $jumlahBeli) {
        $stokSekarang = $stokSekarang;
        $stokBaru = $stokSekarang - $jumlahBeli;
        barangModel::where('idProduk', $idBarang)->update(['stock' => $stokBaru]);
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
    }
}
