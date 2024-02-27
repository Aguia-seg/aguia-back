<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function registerUser(StoreUserRequest $request)
    {

        $client = User::create($request->all());
        $client->fill(['password' => Hash::make($request->cpf)]);
        $client->save();
        return response([
            'message' => 'Usuário registrado com sucesso!',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['cpf', 'password']);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken("token")->plainTextToken;
            // $token = $user->createToken("token")->plainTextToken;

            return response([
                'message' => 'Success!',
                'token' => $token,
                'name' => Auth::user()->name
            ]);
        } else {
            return response([
                'message' => 'Login inválido'
            ], 401);
        }
    }



    public function user(Request $request)
    {
        return response([
            'name' => Auth::guard('web')->user()
        ]);
    }

    public function logout(Request $request){
        // try{
          
            $request->user()->tokens()->delete();
            return response()->json([
                'message' => 'logout success!',
            ]);

    }

    
}
