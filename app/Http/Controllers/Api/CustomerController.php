<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Validator;
use Illuminate\Support\Arr;
use App\Http\Resources\CustomerResource;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerResource::collection(Customer::all());
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'nama'=>'required|max:100',
            'email'=>'required',
            'password'=>'required|min:8|max:12',
            'username'=>'required|max:60',
            'avatar'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        if($request->hasFile('avatar'))
        {
            $destination_path = 'public/images/customer';
            $image = $request -> file('avatar');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);
            $input['avatar'] = $image_name;
        }

        if(Customer::create($input)){
            return response()->json([
                'status'=>TRUE,
                'msg'=>'Customer Berhasil disimpan'
            ],201);
        }
        else
        {
            return response()->json([
                'status'=>FALSE,
                'msg'=>'Customer Gagal disimpan'
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
        $customer = Customer::find($id);
        if(is_null($customer)){
            return response()->json([
                "status"=>FALSE,
                "msg"=>'Record Not Found'
            ],404);
        }

        return new CustomerResource($customer);
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $customer = Customer::find($id);
        if(is_null($customer))
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
            'avatar'=>'image|mimes:jpeg,jpg,png|max:2048'
        ]);


        if($validator->fails()){
            return response()->json([
                "status"=>FALSE,
                "msg"=>$validator->errors()
            ],400);
        }

        $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        if($request->hasFile('avatar'))
        {
            $destination_path = 'public/images/customer';
            $image = $request -> file('avatar');
            $extention = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').".".$extention;
            $path = $request->file('avatar')->storeAs($destination_path, $image_name);
            $input['avatar'] = $image_name;
        }

        $customer->update($input);
        return response()->json([
            'status'=>TRUE,
            'msg'=>'Data Berhasil diupdate'
        ],200);
    }

    public function login_customer(Request $request)
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

        $customer = Customer::where([
            ['email',$email],
        ])->first();

        if(is_null($customer))
        {
            return response()->json([
                'msg'=>'Email Tidak ditemukan'
            ],200);
        }
        else
        {
            if(password_verify($password,$customer->password))
            {
                return response()->json([
                    'msg'=>'Email ditemukan',
                    'customer'=>new CustomerResource($customer)
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
