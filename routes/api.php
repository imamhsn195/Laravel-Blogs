<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\AuthController;

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

// Route::post('/login', function(Request $request){
//     $credentials = $request->only(['email', 'password']);
//     if(Auth::attempt($credentials)){
//         $user = Auth::user();
//         $token = $user->createToken('auth-token')->plainTextToken;
//         return ['access_token', $token];
//     }else{
//         response()->json(['error', 'Unauthorized']);
//     }
// });


// Route::middleware('auth:sanctum')->post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
 
//     return ['token' => $token->plainTextToken];
// });