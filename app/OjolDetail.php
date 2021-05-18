<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OjolDetail extends Model
{
    protected $table = 'ojol_detail';
    protected $fillable = [
        'id_transaksi','id_ojol','status'
    ];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi','id_transaksi');
    }

    public function ojol()
    {
        return $this->belongsTo('App\Ojol','id_ojol');
    }

}
