<?php

namespace App\Http\Resources\Media;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            'fileName' => $this->file_name,
            'type' => $this->mime_type,
            'size' => $this->size,
            'responsiveImages' => $this->responsive_images,
            'url' => $this->original_url,
        ];
    }
}
