<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('app/get_tags', [AdminController::class, 'getTag']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'Login']);
    Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile']);
    });
});


Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {


            Route::group(['middleware' => 'scope:user'], function(){
                Route::get('/user-scope', function(){
                    return response()->json([
                        'message' => 'User can access this',
                        'status_code' =>200
                    ], 200);
                });
            });
            Route::group(['middleware' => 'scope:admin'], function(){
                Route::get('/admin-scope', function(){
                    return response()->json([
                        'message' => 'User can access this',
                        'status_code' =>200
                    ], 200);
                });
            });




});

Route::group(['middleware'=> 'auth:api'],function(){

    Route::post('/post/comments', [CommentController::class, 'index']);
    Route::post('/comment', [CommentController::class, 'store']);

});
