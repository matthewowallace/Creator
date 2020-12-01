<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheck
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->path()=='app/admin_dashboard'){
            return $next($request);
        }

        if(!Auth::check()){
            return response()->json([
                'msg' => 'Cant access route'
            ], 403);
        }

        $user = Auth::user();
        if($user->userType=='User'){
            return response()->json([
                'msg' => 'Cant access route'
            ], 403);
        }

        return $next($request);
    }
}
