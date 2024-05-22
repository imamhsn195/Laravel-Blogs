<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostCollection;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class,'register'])->name('register');

Route::post('/login', [AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->get('/users', function(){
    return new UserCollection(User::paginate());
});

Route::middleware('auth:sanctum')->get('/user/{id}', function(string $id){
    return new UserResource(User::findOrFail($id));
});


// Posts API

// Route::post('posts', [PostController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('posts', PostController::class);
});