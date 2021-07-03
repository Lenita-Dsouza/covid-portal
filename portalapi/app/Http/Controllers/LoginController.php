<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //

    public function index(Request $request)
    {
      //return $request->all();
        $credentials = $request->only(['email', 'password']);
        if ($token = auth()->attempt($credentials)) {
            $user=auth()->user();
            $response = [
                //'user'=>auth()->user(),
                 'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
                 ],
                'token' => [
                    'type' => 'Bearer',
                    'value' => $token,
                    'expires_at' => auth()->factory()->getTTL(),
                ]
            ];
            return response()->json(['user' => $response, 'error' => false]);
        }
        return response()->json(['user' => $response, 'error' => true, 'message' => 'Invalid email or password']);
    }

    public function logout(Request $req)
    {
        if(auth()->check())
        { 
            auth()->logout(true);
             
        return response()->json(['error'=>false, 'message'=>'successfully logout']);
    }
}
}
