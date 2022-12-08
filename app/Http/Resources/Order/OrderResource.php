<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Order\OrderProductResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => $this->when($this->relationLoaded('user'), UserResource::make($this->user)),
            'products' => $this->when($this->relationLoaded('products'), OrderProductResource::collection($this->products)),
            'status' => $this->when($this->relationLoaded('status'), $this->status),
            'created' => $this->created_at
        ];
    }
}
