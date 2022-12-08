<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Basket\BasketResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\User;
use App\Models\Product;
use App\Models\Basket;
use App\Services\UserService;
use App\Data\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\User\UserResource
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\UserRegisterRequest  $request
     * @param  \App\Services\UserService  $request
     * @return \App\Http\Resources\User\UserResource
     */
    public function store(UserRegisterRequest $request, UserService $service)
    {
        $data = $request->validated();

        $createdUser = $service->register($data);

        return new UserResource($createdUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \App\Http\Resources\User\UserResource
     */
    public function show(User $user)
    {
        $user = $user->loadRelationships(request('with'));
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserService $service)
    {
        $data = UserData::fromRequest($request);

        $user = $service->update($data, $user);

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function products($id)
    {
        $products = Product::where('pub_user_id', $id)->cursorPaginate(30);
        return ProductResource::collection($products);
    }

    public function basket($id)
    {
        $basket = Basket::withRelationships(request('with'))->where('user_id', $id)->first();
        return BasketResource::make($basket);
    }
}
