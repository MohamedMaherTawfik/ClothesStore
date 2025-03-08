<?php

namespace App\Http\controllers\auth;

use App\Http\Requests\userAddresses;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userAddress;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController
{
    use apiResponse;

    public function register(userRequest $request) {
        $fields = $request->validated();
        $input = $fields;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['user'] =  $user;

        return $this->apiResponse($success, __('messages.register'));
    }


    public function login()
    {
        $token=auth()->attempt(request(['email', 'password']));
        if (!$token) {
            return $this->sendError(__('messages.Error_login'), ['error'=>__('messages.Error_login')]);
        }
        $success = $this->respondWithToken($token);

        return $this->apiResponse($success, __('messages.login'));
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    public function profile()
    {
        $success = auth()->user();
        if(!$success){
            return $this->sendError(__('messages.Error_profile'), ['error'=>__('messages.Error_profile')]);
        }
        return $this->apiResponse($success, __('messages.profile'));
    }


    public function logout()
    {
        try {
            auth()->logout();
        } catch (\Throwable $th) {
            return $this->sendError(__('messages.Error_logout'), ['error'=>__('messages.Error_logout')]);
        }

        return $this->apiResponse([], __('messages.logout'));
    }


    public function refresh()
    {
        $success = $this->respondWithToken(auth()->refresh());

        return $this->apiResponse($success, __('messages.refresh'));
    }

    public function addAddress(userAddresses $request)
    {
        $fields=$request->validated();
        $data=userAddress::create([
            'user_id'=>Auth::user()->id,
            'address'=>$fields['address'],
            'city'=>$fields['city'],
            'postal_code'=>$fields['postal_code'],
        ]);
        if(!$data){
            return $this->sendError(__('messages.Error_addAddress'));
        }

        return $this->apiResponse($data, __('messages.addAddress'));
    }

}
