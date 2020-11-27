<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['protectedPage']],function(){

    Route::post('app/create_tag', [AdminController::class, 'addTag']);
    Route::get('app/get_tags', [AdminController::class, 'getTag']);
    Route::post('app/edit_tag', [AdminController::class, 'editTag']);
    Route::post('app/delete_tag', [AdminController::class, 'deleteTag']);
    Route::post('app/upload', [AdminController::class, 'upload']);
    Route::post('app/delete_image', [AdminController::class, 'deleteImage']);
    Route::post('app/create_category', [AdminController::class, 'addCategory']);
    Route::get('app/get_category', [AdminController::class, 'getCategory']);
    Route::post('app/edit_category', [AdminController::class, 'editCategory']);
    Route::post('app/delete_category', [AdminController::class, 'deleteCategory']);
    Route::post('app/create_adminusers', [AdminController::class, 'addAdmin']);
    Route::get('app/get_adminusers', [AdminController::class, 'getAdminUsers']);
    Route::post('app/edit_adminusers', [AdminController::class, 'editAdminUsers']);
    Route::post('app/delete_adminusers', [AdminController::class, 'deleteAdminUsers']);
    Route::post('app/admin_dashboard', [AdminController::class, 'AdminLogin']);
    Route::post('app/create_role', [AdminController::class, 'addRole']);
    Route::get('app/get_roles', [AdminController::class, 'getRoles']);
    Route::post('app/edit_role', [AdminController::class, 'editRole']);
    Route::post('app/delete_role', [AdminController::class, 'deleteRole']);
    Route::get('tags', [AdminController::class, 'AllTags']);

});

Route::middleware('auth:api')->get('/user',function (Request $request) {
    return $request->user();
});
// Route::get('/athenticated', function (Request $request){
//     return true;
// });

Route::group(['prefix' => 'api'], function () {

    Route::get('/me', [UserController::class, 'user']);
    Route::get('/me/dates', [UserController::class, 'dates']);
    Route::post('/register', [RegisterController::class, 'getRegister']);
    Route::post('/login', [LoginController::class, 'getLogin']);
    Route::get('/user/{id}',[UserController::class, 'profile']);
    Route::post('/update/user', [UserController::class, 'updates']);
    Route::post('/update/password/user', [UserController::class, 'changePassword']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/checkToken', [LoginController::class, 'checkToken']);

});


Route::get('/', [AdminController::class, 'index']);
Route::any('{slug}', [AdminController::class, 'index']);

