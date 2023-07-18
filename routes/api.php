<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;

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

Route::middleware(['jwt.verify'])->group(function () {
    
    // Route::get("products","index");
    // Route::get("single/{id}","show");
    // Route::post("update/{id}","update");
    // Route::post("delete/{id}","destroy");
    Route::get("catagories",[ApiController::class,"index2"]);
    Route::get("products",[ApiController::class,"index"]);
    Route::get("single/{id}",[ApiController::class,"show"]);
    Route::post("update/{id}",[ApiController::class,"update"]);
    Route::post("delete/{id}",[ApiController::class,"destroy"]);


   
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
// Route::controller(ApiController::class)->group(function(){

//     Route::get("products",[ApiController::class,"index"]);
//     Route::get("single/{id}",[ApiController::class,"show"]);
//     Route::post("update/{id}",[ApiController::class,"update"]);
//     Route::post("delete/{id}",[ApiController::class,"destroy"]);


// });