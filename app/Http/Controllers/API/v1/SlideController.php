<?php

namespace App\Http\Controllers\API\v1;

use App\Data\SlideData;
use App\Http\Controllers\Controller;
use App\Http\Resources\Slide\SlideResource;
use App\Models\Slide;
use App\Services\SlideService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $slides = Slide::all();

        return SlideResource::collection($slides);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SlideService $service
     * @return SlideResource
     */
    public function store(Request $request, SlideService $service)
    {
        $data = SlideData::fromRequest($request);
        $slide = $service->store($data);

        return SlideResource::make($slide);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slide $slide
     * @return Response
     */
    public function destroy(Slide $slide)
    {
        $attachment = $slide->attachments;
        $path = Str::replace('storage/', '', $attachment->url);
        // dd($path);

        if(Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $attachment->delete();
        
        $slide->delete();
    }
}
