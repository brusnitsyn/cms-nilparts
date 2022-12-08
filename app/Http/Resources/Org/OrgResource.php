<?php

namespace App\Http\Resources\Org;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrgResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            // Required
            'id' => $this->id,
            'name' => $this->name,
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'type' => OrgTypeResource::make($this->type),
            'creator' => $this->when($this->relationLoaded('creator'), UserResource::make($this->creator)),
            'slug' => $this->slug,
            'percent' => $this->percent,
            'users' => $this->when($this->relationLoaded('users'), UserResource::collection($this->users)),
            'products' => $this->when($this->relationLoaded('products'), ProductResource::collection($this->products)),
            // No Required
            'ogrn' => $this->when(!is_null($this->ogrn), $this->ogrn),
            'desc' => $this->when(!is_null($this->desc), $this->desc),
            'email' => $this->when(!is_null($this->email), $this->email),
            'call' => $this->when(!is_null($this->call), $this->call),
            'bank_bik' => $this->when(!is_null($this->bank_bik), $this->bank_bik),
            'bank_name' => $this->when(!is_null($this->bank_name), $this->bank_name),
            'bank_ks' => $this->when(!is_null($this->bank_ks), $this->bank_ks),
            'bank_rs' => $this->when(!is_null($this->bank_rs), $this->bank_rs),
        ];
    }
}
