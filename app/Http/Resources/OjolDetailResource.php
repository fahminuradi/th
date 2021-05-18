<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OjolDetailResource extends JsonResource
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
            'id_transaksi' => $this->id_transaksi,
            'id_ojol' => $this->id_ojol,
            'status' => $this->status
        ];
    }
}
