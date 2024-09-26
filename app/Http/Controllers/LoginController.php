<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */

    public function login(LoginRequest $request)
    {
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($user)) {
            $token = Auth::user()->createToken('bagisto')->accessToken;

            return response()->json(['token' => $token]);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

}
