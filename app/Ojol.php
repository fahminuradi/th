<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ojol extends Model
{
    protected $table = 'ojol';
    protected $fillable = [
        'nama','email','username','password','type_kendaraan','nama_kendaraan',
        'warna_kendaraan','nomor_kendaraan','avatar','photo_kendaraan'
    ];
}
