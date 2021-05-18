<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'id_delivery','subtotal','jumlah_pesan','tgl_pemesanan','keterangan'
    ];

    public function delivery()
    {
        return $this->belongsTo('App\Delivery','id_delivery');
    }



}
