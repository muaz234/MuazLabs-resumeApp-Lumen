<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
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

    public function index()
    {
        $users = User::all();
        return response()->json(['message' => 'Retrieved successfully', 'data' => $users], 200);
    }

    public function show($id)
    {
        if(!empty($id))
        {
            // $condition = ['id' => ]
            if($id == Auth::id())
            {
                $user = User::find($id);
                if(!empty($user))
                {
                    return response()->json(['message' => 'Retrieved successfully', 'data' => $user], 200);
                }
                else
                {
                    return response()->json(['message' => 'No historical data found'], 200);
                }
            }
            else
            {
                return response()->json(['message' => 'ID mismatch with authenticated user'], 400);
            }
        }
        else
        {
            return response()->json(['message' => 'No ID was passed along the request in URL'], 400);
        }
    }
}
