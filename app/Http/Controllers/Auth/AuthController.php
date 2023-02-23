<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user_data = $request->all();
        $user = User::create($user_data);

        return response()->json(compact('user'), 200);
    }
    public function login(Request $request)
    {
        $user_email = $request->get('email');
        $user = User::where('email', $user_email)->get();
        return response()->json(compact('user'), 200);
    }
}
