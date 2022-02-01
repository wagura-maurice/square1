<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthLoginFormRequest;
use App\Http\Requests\AuthRegistrationFormRequest;

class ApiAuthController extends Controller
{
    public function register(AuthRegistrationFormRequest $request)
    {
        try {

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return new AuthResource([
                'user'  => $user,
                'token' => $user->createToken(Str::slug($user->id . ' device name'))->plainTextToken
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return new AuthResource([
                'throwable' => $th->getMessage()
            ]);
        }
    }

    public function login(AuthLoginFormRequest $request)
    {
        try {
            // Check email
            $user = User::where('email', $request->email)->firstOrFail();

            // Check password
            if(!$user || !Hash::check($request->password, $user->password)) {
                return new AuthResource([
                    'message' => __('invalid authentication credentials provided')
                ]);
            } else {
                return new AuthResource([
                    'user'  => $user,
                    'token' => $user->createToken(Str::slug($user->_code . ' device name'))
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return new AuthResource([
                'throwable' => $th->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {        
        try {

            return auth()->user()->tokens()->delete() ? new AuthResource([
                'message' => __('user logout successful')
            ]) : new AuthResource([
                'message' => __('user logout unsuccessful, please try again!')
            ]);

        } catch (\Throwable $th) {
            //throw $th;
            return new AuthResource([
                'throwable' => $th->getMessage()
            ]);
        }
    }
}
