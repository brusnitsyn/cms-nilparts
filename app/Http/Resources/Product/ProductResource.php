<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Attachment\AttachmentResource;
use App\Http\Resources\Categories\ProductCategoryResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'article' => $this->article,
            'manufacturer' => $this->manufacturer,
            'machines' => $this->machines,
            'short_description' => $this->short_description,
            'full_description' => $this->full_description,
            'slug' => $this->slug,
//            'images' => $this->when($this->relationLoaded('attachments'), AttachmentResource::collection($this->getImages())),
            // 'org' => $this->when($this->relationLoaded('org'), OrgResource::make($this->org)),
            'creator' => $this->when($this->relationLoaded('user'), UserResource::make($this->user)),
            // 'unit' => $this->when($this->relationLoaded('unit'), UnitResource::make($this->unit)),
            'media' => $this->when($this->relationLoaded('medias'), $this->media()),
            'cover' => $this->cover(),
            'price' => $this->price,
            'in_stock' => (bool)$this->in_stock,
            'category' => ProductCategoryResource::make($this->category),
        ];
    }
}
