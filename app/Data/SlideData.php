<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

final class SlideData extends ObjectData
{
    public ?string $text;
    public ?string $url;
    public ?UploadedFile $image;

    public static function fromRequest(
        Request $request
    ): SlideData {
        return new SlideData(
            text: $request->get('text'),
            url: $request->get('url'),
            image: $request->file('image'),
        );
    }
}
