<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\customerModel;
use App\http\Controllers\ResponseController;

class TableCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tb_customer = customerModel::paginate(6);
        return view('customer.index')->with(['datas' => $tb_customer]);
    }

    public function cari(Request $request) {
        $tb_customer = customerModel::where([
            ['namaLengkap', 'LIKE', $request->get('keyword') . '%']
        ])->paginate(6);
        $hasil = $tb_customer->appends ( array ('keyword' => $request->input('keyword')));
        return view('customer.index')->with(['datas' => $hasil]);
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
        //input data
        $responseController = new ResponseController();
        $response;
        $insert = customerModel::create($request->all());
        if ($insert) {
            $response = $responseController->response(true, 'Berhasil Input Customer');
        } else {
            $response = $responseController->response(false, 'Gagal Input Customer');
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
        $tb_customer = customerModel::where('idCustomer', $id)->first();
        return view('customer.formedit')->with(['data' => $tb_customer]);
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
        $data = $request->all();
        unset($data['_token']);
        $update = customerModel::where('idCustomer', $id)
                ->update($data);
        $responseController = new ResponseController();
        $response;
        if ($update) {
            $response = $responseController->response(true, 'Berhasil Update Customer');
        } else {
            $response = $responseController->response(false, 'Gagal Update Customer');
        }
        return redirect()->route('tampilCustomer')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = customerModel::where('idCustomer', $id)->delete();
        $responseController = new ResponseController();
        $response;
        if ($delete) {
            $response = $responseController->response(true, 'Berhasil Menghapus Data Customer');
        } else {
            $response = $responseController->response(false, 'Gagal Menghapus Data Customer');
        }
        return redirect()->route('tampilCustomer')->with($response);
    }
}
