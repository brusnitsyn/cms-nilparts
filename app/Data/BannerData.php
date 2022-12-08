<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;
use Intervention\Image\File;

final class BannerData extends ObjectData
{
    public ?string $text;
    public ?string $color;
    public ?string $order;
    public ?File $image;

    public static function fromRequest(
        Request $request
    ): BannerData {
        return new BannerData(
            text: $request->get('text'),
            color: $request->get('color'),
            order: $request->get('order'),
            image: $request->get('image'),
        );
    }
}
