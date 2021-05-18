<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Toko;
use Illuminate\Http\Request;
use Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::paginate(5);
        $toko = Toko::all();
        $filterkeyword = $request->get('keyword');
        if($filterkeyword)
        {
            $produk = Produk::where('name','LIKE',"%$filterkeyword%")->paginate(5);
        }
        return view ('produk.index',compact('produk','toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::all();
        return view('produk.create',compact('toko'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if($validator->fails())
        {
            return redirect()->route('produk.create')->withErrors($validator)->withInput();
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
        Produk::create($input);
        
        return redirect()->route('produk.index')->with('status','produk Berhasil disimpan');
        // dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
