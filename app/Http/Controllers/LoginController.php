<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function Login(Request $request){
        $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

       if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'message' => 'Unauthorized',
                'status_code' => 401
            ],401);
       }

       $user = $request->user();

       if($user->role_id == 'admin'){
            $tokenData = $user->createToken('Personal Access Token', ['do_anything']);
       } else {
           $tokenData = $user->createToken('Personal Access Token', ['can_create']);
       }

       $token = $tokenData->token;

       if($token->save()){
           return response()->json([
            'user' => $user,
            'access_token' => $tokenData->accessToken,
            'token_type' => 'Bearer',
            'token_scope' => $tokenData->token->scopes[0],
            'expires_at' => Carbon::parse($tokenData->token->expires_at)->toDataTimeString(),
            'status_code' => 200,
           ], 200);
       }else{
        response()->json([
            'message' => 'An error occurred, Please try again',
            'status_code' => 500
        ], 500);
     }

    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Logout successfully',
            'status_code' => 200
        ],200);
    }
}
