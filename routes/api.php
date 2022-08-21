<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeController;
use App\Http\Controllers\ShoppingController;

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

Route::middleware('auth:sanctum')->get('/users/signup', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/users/signin', function (Request $request) {
    return Auth::user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('users')->group(function () {
         Route::get('', [MeController::class, 'index']);  
        });
        
        Route::post('shopping', [ShoppingController::class, 'store']);  
        Route::get('shopping', [ShoppingController::class, 'index']);  
        Route::get('shopping/{shopping:id}', [ShoppingController::class, 'show']);
        Route::put('shopping/{shopping:id}', [ShoppingController::class, 'update']); 
        Route::delete('shopping/{shopping:id}', [ShoppingController::class, 'destroy']); 

});



