<?php

namespace App\Http\Controllers;

use App\Ojol;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Arr;
use Storage;

class OjolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ojol = Ojol::paginate(5);
        $filterkeyword = $request->get('keyword');
        if($filterkeyword)
        {
            $ojol = Ojol::where('name','LIKE',"%$filterkeyword%")->paginate(5);
        }
        return view('ojol.index',compact('ojol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ojol.create');
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
            'nama'=>'required|max:100',
            'email'=>'required',
            'password'=>'required|min:8|max:12',
            'username'=>'required|max:60',
            'type_kendaraan'=>'required',
            'nama_kendaraan'=>'required',
            'warna_kendaraan'=>'required',
            'nomor_kendaraan'=>'required|max:10',
            'photo_kendaraan'=>'required|image|mimes:jpeg,jpg,png|max:2048',
            'avatar'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails())
        {
            return redirect()->route('ojol.create')->withErrors($validator)->withInput();
        }
        if($request->hasFile('photo_kendaraan'))
        {
            $destination_path = 'public/images/kendaraan';
            $image = $request -> file('photo_kendaraan');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo_kendaraan')->storeAs($destination_path, $image_name);
            $input['photo_kendaraan'] = $image_name;
        }
        if($request->hasFile('avatar'))
        {
            $destination_path = 'public/images/ojol';
            $image = $request -> file('avatar');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);
            $input['avatar'] = $image_name;
        }
        Ojol::create($input);
        
        return redirect()->route('ojol.index')->with('status','Ojek Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ojol  $ojol
     * @return \Illuminate\Http\Response
     */
    public function show(Ojol $ojol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ojol  $ojol
     * @return \Illuminate\Http\Response
     */
    public function edit(Ojol $ojol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ojol  $ojol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ojol $ojol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ojol  $ojol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ojol::findOrFail($id);
        $data->delete();
        return redirect()->route('ojol.index');
    }
}
