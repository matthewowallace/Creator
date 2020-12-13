<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function resetPasswordRequest(Request $request){

        $request->validate([
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json([
                'message' => 'Code sent',
                'status_code' => 200
            ], 200);
        }else{
            $random = rand(111111, 999999);
            $user->verification_code = $random;
            if($user->save()){
                $userData = array(
                    'email' => $user->email,
                    'name' => $user->name,
                    'random' => $random
                );
                Mail::send('emails.reset_password', $userData, function ($message){
                    $message->from('no-reply@youthcreator', 'Password Request');
                    $message->to($userData->email, $userData->name);
                    $message->subject('Reset Password Request (Laravel Vue)');
                });

                if(Mail::failures()){
                    return response()->json([
                        'message' => 'An Error occurred, Please try again',
                        'status_code' => 500
                    ], 500);
                }else{
                    return response()->json([
                        'message' => 'Success',
                        'status_code' => 200
                    ], 200);
                }
            }else{
                return response()->json([
                    'message' => 'An Error occurred, Please try again',
                    'status_code' => 500
                ], 500);
            }
        }

    }

    public function resetPassword(Request $request){

        $request->validate([
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'verification_code'=> 'required|integer',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email',$request->email)->where('verification_code', $request->verification_code)->first();
        if(!$user){
            return response()->json([
                'message' => 'User not found',
                'status_code' => 401
            ], 401);
        }else{
            $user->password = bcrypt(trim($request->password));
            $user->verification_code = Null;
            if($user->save()){

                return response()->json([
                    'message' => 'Password changed Success',
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
}
