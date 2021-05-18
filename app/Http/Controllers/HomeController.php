<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Toko;
use App\Ojol;
use App\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ojol = Ojol::count();
        $produk = Produk::count();
        $toko = Toko::count();
        $customer = customer::count();
        return view('home',compact('ojol','produk','toko','customer'));
    }
}
