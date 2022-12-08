<?php

namespace App\Http\Resources\AdvertisingBanner;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisingBannerResource extends JsonResource
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
            'url' => $this->url,
            'buttonText' => $this->button_text
        ];
    }
}
