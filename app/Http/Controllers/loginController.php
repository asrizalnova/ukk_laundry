<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function postlogin(Request $request){
        $credentials = $request->only('username', 'password');

        // try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'success' => false,
                    'message' => 'invalid username and password',
                ]);
            }
            // }
        //  catch(JWTException $e){
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'generated token failed',
        //     ]);
        // }

        $data = [
            'token' => $token,
            'user' => JWTAuth::user()
        ];

        // return response()->json([
        //     'success' => true,
        //     'message' => 'authentication success',
        //     'data' => $data
        // ]);
        return redirect('index');
    }
    
}
