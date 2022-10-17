<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $email = $request->user;
        $password = $request->password;
        $login = Auth::attempt(['email'=>$email,'password'=>$password]);
        if($login){
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response,201);
        }else{
            return response(null,401);
        }
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        $response = [
            'message'=>'Logged out'
        ];
        return response($response,200);
    }
}
