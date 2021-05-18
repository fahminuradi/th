<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('toko','Api\TokoController');
Route::post('login_toko','Api\TokoController@login_toko');
Route::resource('customer','Api\CustomerController');
Route::post('login_customer','Api\CustomerController@login_customer');
Route::resource('ojol','Api\OjolController');
Route::post('login_ojol','Api\OjolController@login_ojol');
Route::resource('produk','Api\ProdukController');
Route::resource('order','Api\DeliveryController');
Route::resource('invoice','Api\TransaksiController');
Route::resource('pengantaran','Api\OjolDetailController');


