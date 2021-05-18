<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'id_toko','nama_produk','deskripsi','harga','rating','photo','stok'
    ];

    public function toko()
    {
        return $this->belongsTo('App\Toko','id_toko');
    }

}
