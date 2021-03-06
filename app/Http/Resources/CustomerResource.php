<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'avatar'=>env('APP_URL')."/images/customer/".$this->avatar
        ];
    }
}
