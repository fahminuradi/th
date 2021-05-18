@extends('layouts.material')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-motorcycle"></i>
            </div>
            <div class="count">{{ $ojol }}</div>

            <h3>Ojek</h3>
            <p>Jumlah pengendara/ojek</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-shopping-cart"></i>
            </div>
            <div class="count">{{ $toko }}</div>

            <h3>Toko</h3>
            <p>Jumlah seluruh toko</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-tags"></i>
            </div>
            <div class="count">{{ $produk }}</div>

            <h3>Produk</h3>
            <p>Jumlah seluruh produk</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i>
            </div>
            <div class="count">{{$customer}}</div>

            <h3>Customer</h3>
            <p>Jumlah Customer</p>
        </div>
    </div>
</div>
@endsection
