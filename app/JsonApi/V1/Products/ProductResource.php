<?php

namespace App\JsonApi\V1\Products;

use LaravelJsonApi\Core\Resources\JsonApiResource;

class MediaResource extends JsonApiResource
{

    /**
     * Get the resource's attributes.
     *
     * @param \Illuminate\Http\Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'title' => $this->title,
            'media' => $this->medias,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
