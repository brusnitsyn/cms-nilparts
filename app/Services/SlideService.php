<?php

namespace App\Services;

use App\Data\SlideData;
use App\Models\Slide;

class SlideService
{
    public function store(SlideData $data) {
        $slide = new Slide();

        if(isset($data->text))
            $slide->text = $data->text;

        if(isset($data->url))
            $slide->url = $data->url;

        $slide->save();

        return $slide;
    }
}
