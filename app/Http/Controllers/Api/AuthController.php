<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'access_token' => $user->createToken('API Token')->plainTextToken,
            'user' => $user
        ], 201);

    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string|min:8'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::whereEmail($request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => "Invalid Credentials."], 422);
        }

        return response()->json([
            'access_token' => $user->createToken('API Token')->plainTextToken,
            'user' => $user
        ], 200);

    }

}
