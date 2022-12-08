<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('slug')) {
            $categories = ProductCategoryResource::make(ProductCategory::where('slug', $request->slug)->first());
        } else {
            $categories = ProductCategoryResource::collection(ProductCategory::withRelationships(['childrens', 'medias'])->whereNull('category_parent_id')->orderBy('title')->get());
        }

        //$categories = ProductCategoryResource::collection(ProductCategory::all());
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = ProductCategory();
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|',
            'category_parent_id' => 'nullable|numeric'
        ]);

        $productCategory->create($request->all());
        return ProductCategoryResource::make($productCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'category_parent_id' => 'nullable|numeric'
        ]);

        $productCategory = ProductCategory::updateOrCreate([
            'id' => $id
        ], [
            'name' => $data['name'],
            'category_parent_id' => array_key_exists('category_parent_id', $data) ? $data['category_parent_id'] : null
        ]);
        return ProductCategoryResource::make($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
