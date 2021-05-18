<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'nama_pengelola' => $this->nama_pengelola,
            'email' => $this->email,
            'password' => $this->password,
            'nama_toko' => $this->nama_toko,
            'photo'=>env('APP_URL')."/images/toko/".$this->photo,
            'desc_toko' => $this->desc_toko,
            'alamat' => $this->alamat,
        ];
    }
}
