<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Arr;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::paginate(5);
        $filterkeyword = $request->get('keyword');
        if($filterkeyword)
        {
            $customer = Customer::where('name','LIKE',"%$filterkeyword%")->paginate(5);
        }
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'avatar'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails())
        {
            return redirect()->route('customer.create')->withErrors($validator)->withInput();
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
        Customer::create($input);
        
        return redirect()->route('customer.index')->with('status','Customer Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
