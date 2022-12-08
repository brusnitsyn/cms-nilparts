<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Resources\Blog\BlogResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(16);
        return BlogResource::collection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return BlogResource
     */
    public function store(Request $request)
    {
        $blog = new Blog();

        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->content = $request->content;
        $blog->creator_id = auth()->user()->id;

        $blog->save();

        return new BlogResource($blog);
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return BlogResource
     */
    public function show(Blog $blog)
    {
        return BlogResource::make($blog);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request) {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $picName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads'), $picName);

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => env('APP_URL') . "/uploads/$picName"
            ]
        ]);
    }
}
