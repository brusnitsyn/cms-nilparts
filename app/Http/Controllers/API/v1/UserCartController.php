<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\Cart\CartOrderRequest;
use App\Models\UserCart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function show(UserCart $userCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCart $userCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCart  $userCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCart $userCart)
    {
        //
    }

    public function order(CartOrderRequest $request)
    {
        //
    }
}
