<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisingBanner\AdvertisingBannerResource;
use App\Models\AdvertisingBanner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Console\DependencyInjection\AddConsoleCommandPass;

class AdvertisingBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AdvertisingBannerResource
     */
    public function index()
    {
        $advertBanner = AdvertisingBanner::first();
        if($advertBanner)
            return AdvertisingBannerResource::make($advertBanner);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AdvertisingBannerResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'nullable|string|max:45',
            'url' => 'nullable|string',
            'buttonText' => 'nullable|string'
        ]);

        $advertBanner = AdvertisingBanner::updateOrCreate(
            ['id' => 1],
            [
                'text' => $request->text,
                'url' => $request->url,
                'button_text' => $request->buttonText
            ],
        );

        return AdvertisingBannerResource::make($advertBanner);
    }

    /**
     * Display the specified resource.
     *
     * @param AdvertisingBanner $advertBanner
     * @return AdvertisingBannerResource
     */
    public function show(AdvertisingBanner $advertBanner)
    {
        return AdvertisingBannerResource::make($advertBanner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return AdvertisingBannerResource
     */
    public function update(Request $request, $id)
    {


        // if(!$advertBanner)
        //     AdvertisingBanner

        // $advertBanner->update([
        //     'text' => $request->text,
        //     'url' => $request->url,
        //     'button_text' => $request->buttonText
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AdvertisingBanner $advertBanner
     * @return Response
     */
    public function destroy(AdvertisingBanner $advertBanner)
    {
        $advertBanner->delete();
    }
}
