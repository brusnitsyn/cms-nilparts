<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisingBanner\AdvertisingBannerResource;
use App\Http\Resources\Slide\SlideResource;
use App\Models\Banner;
use App\Http\Resources\Banner\BannerResource;
use App\Models\IndexBanner;
use App\Models\IndexSlide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = IndexSlide::all();
        $banner = IndexBanner::first();

        return response()->json([
            'data' => [
                'slides' => SlideResource::collection($slides),
                'banner' => isset($banner) ? BannerResource::make($banner) : null
            ]
        ]);
    }
}
