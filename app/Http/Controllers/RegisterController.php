<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>  ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

         if($user->save()){
             return response()->json([
                 'message' => 'User created successfully',
                 'status_code' => 200
             ], 200);
         }else{
            return response()->json([
                'message' => 'An Error occurred, Please try again',
                'status_code' => 500
            ], 500);
         }


    }
}
