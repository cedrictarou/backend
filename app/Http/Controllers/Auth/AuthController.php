<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $user_data = $request->only("name", "email", "password", "uid");
        $user_data = $request->all();
        $user = User::create($user_data);
        // $message = "success";
        // return  response()->json(compact("message", "user"), 201);
        return response()->json([
            'data' => $user
        ], 201);
    }
    public function login()
    {
        $message = "login success";
        return response()->json(compact('message'), 200);
    }
    public function logout()
    {
        $message = "logout success";
        return response()->json(compact('message'), 200);
    }
}
