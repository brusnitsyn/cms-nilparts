<?php

namespace App\Http\Resources\Basket;

use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Basket\BasketProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
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
            'basket' => [
                'total_price' => $this->totalPrice(),
            ],
            'products' => BasketProductResource::collection($this->products),
            // 'products' => ProductResource::collection($this->products),
        ];
    }
}
