<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $fillable = [
        'id_produk','id_customer','tujuan','alamat','latitude','longitude'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Produk','id_produk');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer','id_customer');
    }
}
