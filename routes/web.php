<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;


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

// Route::group(['middleware'=>['protectedPage']],function(){

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
    Route::post('app/admin_dashboard', [LoginController::class, 'Login']);
    Route::post('app/create_role', [AdminController::class, 'addRole']);
    Route::get('app/get_roles', [AdminController::class, 'getRoles']);
    Route::post('app/edit_role', [AdminController::class, 'editRole']);
    Route::post('app/delete_role', [AdminController::class, 'deleteRole']);
    Route::get('tags', [AdminController::class, 'AllTags']);

// });


    Route::post('app/create_post', [UserController::class, 'addPost']);
    Route::get('app/get_posts', [UserController::class, 'getPosts']);
    Route::post('app/edit_post', [UserController::class, 'editPost']);
    Route::post('app/create_Scenario', [UserController::class, 'addScenario']);
    Route::get('app/get_Scenarios', [UserController::class, 'getScenarios']);
    Route::post('app/edit_Scenario', [UserController::class, 'editScenario']);
    Route::post('app/delete_Scenario', [UserController::class, 'deleteScenario']);
    Route::post('app/delete_post', [UserController::class, 'deletePost']);
    Route::post('app/user_upload', [UserController::class, 'upload']);
    Route::post('app/user_delete_image', [UserController::class, 'deleteImage']);

    Route::post('app/delete_comment', [CommentController::class, 'deleteComment']);
    Route::post('app/add_comment', [CommentController::class, 'addComment']);
    Route::get('app/get_comments', [CommentController::class, 'getComments']);
    Route::post('app/edit_comment', [CommentController::class, 'editComment']);




    Route::get('/', [AdminController::class, 'index']);
    Route::any('{slug}', [AdminController::class, 'index']);


