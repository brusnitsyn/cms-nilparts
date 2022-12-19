<?php

namespace App\Http\Resources\Blog;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Attachment\AttachmentResource;
use App\Http\Resources\User\UserResource;

class BlogResource extends JsonResource
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
            'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'blocks' => $this->blocks,
//            'user' => UserResource::make($this->user),
//            'image' => AttachmentResource::make($this->attachments),
            'created_at' => $this->created_at->format('d.m.Y H:i')
        ];
    }
}
