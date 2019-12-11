<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function add(Request $request)
    {
        $rules = ['email' => 'required|email', 'name' => 'required', 'password' => 'required|max:50'];
        $this->validate($request, $rules);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60)
        ]);
        return response()->json(['message' => 'User created successfully', 'auth_token' => $user->api_token], 201);
    }
}
