<?php

namespace App\Http\Resources\Slide;

use App\Http\Resources\Attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
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
            'btn_link' => $this->btn_link,
            'btn_text' => $this->btn_text,
            'image' => $this->media(),
        ];
    }
}
