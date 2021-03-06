<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WaterBillControllerAPI;
use App\Http\Controllers\API\WaterBillPostController;

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

Route::post('login',[WaterBillControllerAPI::class,'login']);
Route::post('register',[WaterBillControllerAPI::class,'register']);
Route::post('reset-password',[WaterBillControllerAPI::class,'reset-password']);


Route::get('get-all-posts',[WaterBillPostController::class,'getAllPosts']);
Route::get('get-post',[WaterBillPostController::class,'getPost']);
Route::get('search-post',[WaterBillPostController::class,'searchPost']);
