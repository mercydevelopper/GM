<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{


    //function register

    public function register(Request $request){
       
       $validatedData = $request->validate([
           
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8'

       ]);

       $user = User::create([

            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])

       ]);

       $tokens = $user->createToken('auth_token')->plainTextToken;

       return response()->json([

            'access_token' => $tokens,
            'token_type' => 'Bearer'
        ]);

    }


    //function login


   public function login(Request $request){

       if(!Auth::attempt($request->only('email', 'password'))){

           return response()->json([
               'message' => 'email ou mot de passe incorect'
           ], 401);
        }

        $user = User::where('email' , $request['email'])->firstOrFail();

        $tokens = $user->createToken('auth_token')->plainTextToken;

         return response()->json([

            'message' => 'Authentification reussi !!!',
            'access_token' => $tokens,
            'token_type' => 'Bearer'
        ]);

    }



    // function usserifo

    public function userInfo(Request $request){

        return $request->user();
    }


    // function Logout


    public function logout(Request $request){

         $request->user()->currentAccessToken()->delete();

          return response()->json([

            'statuts' => '200',

            'message' => 'deconnecté'
            
        ]);


    }



   




}
