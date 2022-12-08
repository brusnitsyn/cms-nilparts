<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Org\OrgResource;
use App\Http\Resources\Org\OrgUserResource;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'call' => $this->call,
            'address' => $this->address,
            'role' => $this->role,
            'orders' => $this->when($this->relationLoaded('orders'), OrderResource::collection($this->orders)),
            'products' => $this->when($this->relationLoaded('products'), ProductResource::collection($this->products()->paginate(16))),
        ];
    }
}
