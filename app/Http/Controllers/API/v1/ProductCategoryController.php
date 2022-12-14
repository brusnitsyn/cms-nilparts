<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\ProductCategoryResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slugs\ProductCategorySlug;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return ProductCategoryResource::collection(ProductCategory::withRelationships(['medias'])->whereNull('category_parent_id')->orderBy('title')->get());
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
     * @param $slug
     * @return ProductCategoryResource|AnonymousResourceCollection
     */
    public function show($slug)
    {
        $categorySlug = ProductCategorySlug::where('slug', $slug)->first();
        $category = ProductCategory::whereId($categorySlug->product_category_id)
            ->withRelationships(request('with'))
            ->first();


        if(!count($category->products)) {
            $flatten = $this->flatten($category);

            foreach ($flatten as $key => $fl) {
                if (!array_key_exists('category_id', $fl)) {
                    unset($flatten[$key]);
                }
            }

            $productsArray = array_values($flatten);
            $products = collect();
            foreach ($productsArray as $product) {
                $productModel = Product::whereId($product['id'])->first();
                $products->push($productModel);
            }

            return ProductResource::collection($products->unique());
        }

        unset($category->products);
        return ProductCategoryResource::make($category);
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

    public function flatten($array)
    {
        $flatArray = [];

        if (!is_array($array)) {
            $array = (array)$array;
        }

        foreach($array as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $flatArray = array_merge($flatArray, $this->flatten($value));
            } else {
                $flatArray[0][$key] = $value;
            }
        }

        return $flatArray;
    }
}
