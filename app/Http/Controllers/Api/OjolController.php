<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ojol;
use Validator;
use Illuminate\Support\Arr;
use App\Http\Resources\OjolResource;

class OjolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OjolResource::collection(Ojol::all());
    }


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

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
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

        if(Ojol::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Ojol Berhasil disimpan'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Ojol Gagal disimpan'
            ],200);
        }
    }

    public function show($id)
    {
        $ojol = Ojol::find($id);
        if(is_null($ojol)){
            return response()->json([
                "status"=>FALSE,
                "msg"=>'Record Not Found'
            ],404);
        }

        return new OjolResource($ojol);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $ojol = Ojol::find($id);
        if(is_null($ojol))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Record Not Found',
            ],404);
        }

        $validator = Validator::make($input,[
            'nama'=>'max:100',
            'password'=>'min:8|max:12',
            'username'=>'max:60',
            'nomor_kendaraan'=>'max:10',
            'photo_kendaraan'=>'image|mimes:jpeg,jpg,png|max:2048',
            'avatar'=>'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
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


        $ojol->update($input);
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Data Berhasil diupdate'
        ],200);
    }
    public function login_ojol(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'email'=>'required',
            'password'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>$validator->errors()
            ],400);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $ojol = Ojol::where([
            ['email',$email],
        ])->first();

        if(is_null($ojol))
        {
            return response()->json([
                'msg'=>'Email Tidak ditemukan'
            ],200);
        }
        else
        {
            if(password_verify($password,$ojol->password))
            {
                return response()->json([
                    'msg'=>'Email ditemukan',
                    'ojol'=>new OjolResource($ojol)
                ],200);
            }
            else
            {
                return response()->json([
                    'msg'=>'Email & Password Tidak Sesuai',
                ],200);
            }
        }
    }

}
