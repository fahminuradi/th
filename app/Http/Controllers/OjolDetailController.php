<?php

namespace App\Http\Controllers;

use App\OjolDetail;
use App\Ojol;
use App\Transaksi;
use Illuminate\Http\Request;

class OjolDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ojol_detail = OjolDetail::paginate(5);
        $ojol = Ojol::all();
        $transaksi = Transaksi::all();
        $filterkeyword = $request->get('keyword');
        if($filterkeyword)
        {
            $ojol = Ojol::where('name','LIKE',"%$filterkeyword%")->paginate(5);
        }
        return view('ojol_detail.index',compact('ojol_detail','ojol','transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OjolDetail  $ojolDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OjolDetail $ojolDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OjolDetail  $ojolDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OjolDetail $ojolDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OjolDetail  $ojolDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OjolDetail $ojolDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OjolDetail  $ojolDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OjolDetail $ojolDetail)
    {
        //
    }
}
