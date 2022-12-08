<?php

namespace App\Http\Resources\Categories;

use App\Http\Resources\Attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
//            'parent_id' => $this->category_parent_id,
            'image' => $this->when($this->relationLoaded('medias'), $this->media()),
            'children' => self::collection($this->childrens),
        ];
    }
}
