<?php

namespace App\Http\controllers\auth;

use App\Http\Requests\userAddresses;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Validator;
use Illuminate\Http\Request;
use App\Models\userAddress;

class AuthController
{
    use apiResponse;

    public function register(userRequest $request) {
        $fields = $request->validated();
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['user'] =  $user;

        return $this->apiResponse($success, 'User register successfully.');
    }


    public function login()
    {
        $credentials = request(['email', 'password']);
        // dd($token);
        if (! $token = auth()->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken($token);

        return $this->apiResponse($success, 'User login successfully.');
    }


    public function profile()
    {
        $success = auth()->user()->load('userAddress');

        return $this->apiResponse($success, 'Refresh token return successfully.');
    }


    public function logout()
    {
        auth()->logout();

        return $this->apiResponse([], 'Successfully logged out.');
    }


    public function refresh()
    {
        $success = $this->respondWithToken(auth()->refresh());

        return $this->apiResponse($success, 'Refresh token return successfully.');
    }


    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
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
            return $this->sendError('Address Not Created');
        }

        return $this->apiResponse($data, 'Address created successfully.');
    }

}
