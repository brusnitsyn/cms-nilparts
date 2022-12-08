<?php

namespace App\Services;

use App\Models\User;
use App\Data\UserData;
use App\Http\Resources\User\UserResource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function me()
    {
        return UserResource::make(auth()->user());
    }

    public function register($data)
    {
        $findedUser = User::where('email', $data['email'])->first();
        if($findedUser) throw ValidationException::withMessages(['email' => 'Такой пользователь уже зарегистрирован'])->status(401);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
//        $user->call = $data['call'];
        $user->password = Hash::make($data['password']);

        $user->save();

//        event(new Registered($user));

        return $user;
//        $credentials = array();
//        $credentials['email'] = $user->email;
//        $credentials['password'] = $user->password;
//
//        if ($token = auth()->attempt($credentials)) {
//            return $this->respondWithToken($token);
//        }
    }

    public function login(UserData $data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) throw ValidationException::withMessages(['email' => 'Пользователь не найден'])->status(403);

        $credentials = array();
        $credentials['email'] = $data->email;
        $credentials['password'] = $data->password;

        if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            return auth()->user()->createToken('API')->plainTextToken;
        } else {
            throw ValidationException::withMessages([
                'password' => 'Неверный пароль'
            ])->status(403);
        }

//        if ($token = auth()->attempt($credentials)) {
//            return $this->respondWithToken($token);
//        } else {
//            throw ValidationException::withMessages([
//                'password' => 'Неверный пароль.'
//            ]);
//        }
    }

    public function update(UserData $data, User $user) {
        $user->update([
            'name' => $data->name,
            'email' => $data->email,
            'call' => $data->call,
            'address' => $data->address
        ]);

        return $user;
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        //auth()->logout();
        return true;
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
