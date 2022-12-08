<?php

namespace App\Http\Controllers\API\v1;

use App\Data\ProductData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\OrgUser;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'showSlug']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $products = Product::withRelationships(request('with'))
//            ->search(request('search'))
//            ->filters($request)
            ->orderBy(request('sort', 'created_at'), request('order', 'desc'))
            ->paginate(16);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\ProductStoreRequest  $request
     * @return ProductResource
     */
    public function store(ProductStoreRequest $request, ProductService $service)
    {
        $data = ProductData::fromArray($request->validated());

        $product = $service->store($data);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        $product = $product->loadRelationships(request('with'));
        return ProductResource::make($product);
    }

    public function showSlug($slug)
    {
        $productSlug = DB::table('product_slugs')->where('slug', $slug)->first();
        $product = Product::whereId($productSlug->id)->first();
        $product->loadRelationships(request('with'));
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  \App\Models\Product  $product
     * @return ProductResource
     */
    public function update(ProductUpdateRequest $request, Product $product, ProductService $service)
    {

        $data = ProductData::fromArray($request->validated());
//        dd($request->all());

        $updatedProduct = $service->update($data, $product);

        return ProductResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $user = Auth()->user();
        $orgUser = OrgUser::where('user_id', $user->id)->first();

        if ($product->pub_user_id == $user->id || $product->pub_org_id == $orgUser->org_id)
            $product->delete();
    }
}
