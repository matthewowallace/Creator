<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;

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
        Route::post('/logout', [LoginController::class, 'logout']);
    });
});


Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {

           Route::post('/edit-post',function(){
                return response()->json([
                    'message' => 'Everyone access',
                    'status_code' => 200
                ], 200);
           })->middleware('scope: can_create');

           Route::post('/create-post',function(){
            return response()->json([
                'message' => 'Everyone access',
                'status_code' => 200
            ], 200);
            })->middleware('scope: can_create');

    });
});
