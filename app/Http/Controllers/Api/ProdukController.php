<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use Validator;
use App\Http\Resources\ProdukResource;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProdukResource::collection(Produk::all());
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nama_produk'=>'required|max:100',
            'deskripsi'=>'required',
            'harga'=>'required',
            'rating'=>'required|max:10',
            'stok'=>'required|max:5',
            'photo'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/produk';
            $image = $request -> file('photo');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo')->storeAs($destination_path, $image_name);
            $input['photo'] = $image_name;
        }

        if(Produk::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Produk Berhasil disimpan'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Produk Gagal disimpan'
            ],200);
        }
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        if(is_null($produk)){
            return response()->json([
                "status"=>FALSE,
                "msg"=>'Record Not Found'
            ],404);
        }

        return new ProdukResource($produk);
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $produk = Produk::find($id);
        if(is_null($produk))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Record Not Found',
            ],404);
        }

        $validator = Validator::make($input,[
            'nama_produk'=>'max:100',
            'rating'=>'max:10',
            'stok'=>'max:5',
            'photo'=>'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/produk';
            $image = $request -> file('photo');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo')->storeAs($destination_path, $image_name);
            $input['photo'] = $image_name;
        }

        $produk->update($input);
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Data Berhasil diupdate'
        ],200);
    }

}
