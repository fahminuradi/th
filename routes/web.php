<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.new_login');
});

Auth::routes();

Route::match(["GET","post"],"/register", function(){
    return redirect('login');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('toko','TokoController');
Route::resource('ojol','OjolController');
Route::resource('produk','ProdukController');
Route::resource('customer','CustomerController');
Route::resource('order','DeliveryController');
Route::resource('invoice','TransaksiController');
Route::resource('pengantaran','OjolDetailController');
Route::get('/orderpage', function () {
    return view('order');
});
Route::view('/template', 'layouts.material');
