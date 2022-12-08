<?php

namespace App\Http\Resources\Banner;

use App\Http\Resources\Attachment\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'text' => $this->text,
            'btn_link' => $this->btn_link,
            'btn_text' => $this->btn_text,
        ];
    }
}
