<?php

namespace App\Http\controllers\auth;

use App\Http\Requests\userAddresses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Validator;
use Illuminate\Http\Request;
use App\Models\userAddress;

class AuthController
{
    use apiResponse;

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|string|max:25',
            'email' => 'required|email|unique:users,email',
            'phone'=>'required|min:3|max:25|string',
            'password' => ['required','confirmed',Password::min(8)->mixedCase()->numbers()],
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['user'] =  $user;

        return $this->apiResponse($success, 'User register successfully.');
    }


    public function login()
    {
        $credentials = request(['email', 'password']);

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
