<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OjolResource extends JsonResource
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
            'nama' => $this->nama,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'type_kendaraan' => $this->type_kendaraan,
            'nama_kendaraan' => $this->nama_kendaraan,
            'warna_kendaraan' => $this->warna_kendaraan,
            'nomor_kendaraan' => $this->nomor_kendaraan,
            'avatar'=>env('APP_URL')."/images/ojol/".$this->avatar,
            'photo_kendaraan'=>env('APP_URL')."/images/kendaraan/".$this->photo_kendaraan
        ];
    }
}
