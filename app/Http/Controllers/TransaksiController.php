<?php

namespace App\Http\Controllers;
use App\barangModel;
use App\customerModel;
use Illuminate\Http\Request;
use App\http\Controllers\ResponseController;

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
        return view('transaksi.index')->with(['listData' => $listBarang, 'listMember' => $listMember]);
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
        $data = $request->all();
        var_dump($data);
        // $dataUser = customerModel::where('nomorHp', $data['nomo'])
        // $insert = 
        // $responseController = new ResponseController();
        // $response;
        // if ($insert) {
        //     $mail = Mail::send('kartumember.index', $data, function($message) use ($data, $pdf){
        //         $message->to($data['email']);
        //         $message->attachData($pdf->output(),'card.pdf');
        //     });
        //     $response = $responseController->response(true, 'Transaksi Berhasil');
        // } else {
        //     $response = $responseController->response(false, 'Transaksi Gagal');
        // }
        // return redirect()->back()->with($response);
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
