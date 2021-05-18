<?php

namespace App\Http\Controllers;

use App\Toko;
use Illuminate\Http\Request;
use Validator;
use Storage;
use Illuminate\Support\Arr;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $toko = Toko::paginate(5);
        $filterkeyword = $request->get('keyword');
        if($filterkeyword)
        {
            $toko = Toko::where('name','LIKE',"%$filterkeyword%")->paginate(5);
        }
        return view('toko.index',compact('toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.create');
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
            'nama_pengelola'=>'required|max:100',
            'email'=>'required',
            'password'=>'required|min:8|max:12',
            'nama_toko'=>'required|max:20',
            'desc_toko'=>'required',
            'photo'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails())
        {
            return redirect()->route('toko.create')->withErrors($validator)->withInput();
        }
        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/toko';
            $image = $request -> file('photo');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo')->storeAs($destination_path, $image_name);
            $input['photo'] = $image_name;
        }
        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);

        Toko::create($input);
        
        return redirect()->route('toko.index')->with('status','Toko Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        return view ('toko.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $toko= Toko::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input,[
            'nama_pengelola'=>'max:100',
            'nama_toko'=>'max:20',
        ]);

        if($validator->fails())
        {
            return redirect()->route('toko.edit',[$id])->withErrors($validator)->withInput();
        }
        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/toko';
            $image = $request -> file('photo');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo')->storeAs($destination_path, $image_name);
            $input['photo'] = $image_name;
        }
        $toko->update($input);
        
        return redirect()->route('toko.index')->with('status','Toko Berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toko  $toko
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Toko::findOrFail($id);
        $data->delete();
        return redirect()->route('toko.index');
    }
}
