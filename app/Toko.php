<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';
    protected $fillable = [
        'nama_pengelola','email','password','nama_toko','photo','desc_toko','alamat'
    ];
}
