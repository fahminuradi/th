<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\OjolDetail;
use Validator;
use App\Http\Resources\OjolDetailResource;

class OjolDetailController extends Controller
{
    
    public function index()
    {
        return OjolDetailResource::collection(OjolDetail::all());
    }

   
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'id_transaksi'=>'required',
            'id_ojol'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        if(OjolDetail::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Pesanan Berhasil Dibuat'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Pesanan Gagal Dibuat'
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
