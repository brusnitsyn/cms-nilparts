<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Basket\BasketStoreRequest;
use App\Http\Resources\Basket\BasketResource;
use App\Models\Basket;
use App\Models\BasketProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check()) {
            $id = auth()->id();
            $basket = Basket::where('user_id', $id)->first();
            return BasketResource::make($basket);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasketStoreRequest $request)
    {
        $data = $request->validated();
        $userId = auth()->id();

        // Корзина
        $basket = Basket::firstOrCreate(['user_id' => $userId]);

        // Продукты добавляемые в корзину
        $basketProduct = BasketProduct::firstOrCreate(
            ['product_id' => $data['product_id']],
            [
                'quantity' => $data['quantity'],
                'basket_id' => $basket->id
            ]
        );

        if(!$basketProduct->wasRecentlyCreated)
            $basketProduct->quantity++;

        $basketProduct->save();

        return BasketResource::make($basket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $basket = Basket::with('products')->whereId($id)->first();
        return BasketResource::make($basket);
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
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $ids = explode(",", $request->ids);
        $basket = Basket::where('user_id', auth()->id())->first();

        foreach ($ids as $id) {
            $basket->products()->detach($id);
        }

        $basket->touch();
    }
}
