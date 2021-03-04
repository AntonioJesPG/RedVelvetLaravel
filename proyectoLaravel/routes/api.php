<?php

use App\Http\Controllers\API\cartaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index',[cartaController::class,'index']);
Route::get('show/{id}',[cartaController::class,'show']);
Route::post('store',[cartaController::class,'store']);
Route::put('update/{id}',[cartaController::class,'update']);
Route::delete('destroy/{id}',[cartaController::class,'destroy']);
