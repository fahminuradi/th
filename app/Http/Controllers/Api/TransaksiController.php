<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Delivery;
use Validator;
use App\Http\Resources\TransaksiResource;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TransaksiResource::collection(Transaksi::all());
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'id_delivery'=>'required',
            'jumlah_pesan'=>'required',
            'tgl_pemesanan'=>'required',
            'keterangan'=>'required',
        ]);



        if($validator->fails()){
            return response()->json([
                "status"=>FALSE, 
                "msg"=>$validator->errors()
            ],400);
        }

        $delivery = Delivery::find($request->id_delivery);
        $input['subtotal'] = $input['jumlah_pesan'] * $delivery->produk->harga;

        if(Transaksi::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Transaksi Berhasil Dibuat'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Transaksi Gagal Dibuat'
            ],200);
        }
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
