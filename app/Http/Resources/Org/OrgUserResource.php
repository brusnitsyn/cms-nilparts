<?php

namespace App\Http\Resources\Org;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrgUserResource extends JsonResource
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
            'job_title' => $this->when(!is_null($this->user_job_title), $this->user_job_title),
            //'user' => UserResource::make($this->user),
            'org' => OrgResource::make($this->org),
        ];
    }
}
