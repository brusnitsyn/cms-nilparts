<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserLoginRequest;
use App\Http\Requests\Users\UserRegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Services\UserService;
use App\Data\UserData;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Регистрация пользователя
     *
     * @param  \App\Http\Requests\Users\UserRegisterRequest  $request
     * @param  \App\Services\UserService  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request, UserService $service)
    {
        $data = $request->validated();

        $createdUser = $service->register($data);

        return response()->json([
            'token' => $createdUser->createToken('API')->plainTextToken
        ]);
        //return response($createdUser, 201);
    }

    /**
     * Авторизация пользователя
     *
     * @param  \App\Http\Requests\Users\UserLoginRequest  $request
     * @param  \App\Services\UserService  $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request, UserService $service)
    {
        $data = UserData::fromRequest($request);

        $token = $service->login($data);

        return response()->json([
            'token' => $token
        ]);
    }

    public function refresh(UserService $service)
    {
        return $service->refresh();
    }

    public function logout(UserService $service)
    {
        return $service->logout();
    }

    /**
     * Пользователь
     *
     * @param  \App\Services\UserService  $service
     * @return UserResource
     */
    public function me(UserService $service)
    {
        $user = $service->me();

        return UserResource::make($user);
    }
}
