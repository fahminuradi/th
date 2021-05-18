<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
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
            'id_toko' => $this->id_toko,
            'nama_produk' => $this->nama_produk,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'photo'=>env('APP_URL')."/images/produk/".$this->photo,
            'rating' => $this->rating,
            'stok' => $this->stok,
        ];
    }
}
