<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id_delivery' => $this->id_delivery,
            'subtotal' => $this->subtotal,
            'jumlah_pesan' => $this->jumlah_pesan,
            'tgl_pemesanan' => $this->tgl_pemesanan,
            'keterangan' => $this->keterangan
        ];
    }
}
