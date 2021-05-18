<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Toko;
use Validator;
use Illuminate\Support\Arr;
use App\Http\Resources\TokoResource;


class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TokoResource::collection(Toko::all());
    }


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

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        if($request->hasFile('photo'))
        {
            $destination_path = 'public/images/toko';
            $image = $request -> file('photo');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('photo')->storeAs($destination_path, $image_name);
            $input['photo'] = $image_name;
        }

        if(Toko::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Toko Berhasil disimpan'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Toko Gagal disimpan'
            ],200);
        }
    }


    public function show($id)
    {
        $toko = Toko::find($id);
        if(is_null($toko)){
            return response()->json([
                "status"=>FALSE,
                "msg"=>'Record Not Found'
            ],404);
        }

        return new TokoResource($toko);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $toko = Toko::find($id);
        if(is_null($toko))
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Record Not Found',
            ],404);
        }

        $validator = Validator::make($input,[
            'nama_pengelola'=>'max:100',
            'email'=>'',
            'password'=>'min:8|max:12',
            'nama_toko'=>'max:20',
            'desc_toko'=>'',
            'photo'=>'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
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
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Data Berhasil diupdate'
        ],200);
    }

    public function login_toko(Request $request)
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

        $toko = Toko::where([
            ['email',$email],
        ])->first();

        if(is_null($toko))
        {
            return response()->json([
                'msg'=>'Email Tidak ditemukan'
            ],200);
        }
        else
        {
            if(password_verify($password,$toko->password))
            {
                return response()->json([
                    'msg'=>'Email ditemukan',
                    'toko'=>new TokoResource($toko)
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
