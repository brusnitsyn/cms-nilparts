<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Attachment\AttachmentResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Product\SaleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
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
            'order' => $this->when($this->relationLoaded('order'), OrderResource::make($this->order)),
            'product' => $this->when($this->relationLoaded('product'), ProductResource::make($this->product)),
            'quantity' => $this->quantity,
        ];
    }
}
