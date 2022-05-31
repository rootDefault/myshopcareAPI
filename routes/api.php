<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\salesController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>'auth:sanctum'],function(){

   //item routes
Route::get("items",[itemsController::class,'getAllItems']);
Route::get("items/{id}",[itemsController::class,'getItem']);
Route::get("items/name/{name}",[itemsController::class,'getItemByname']);
Route::post("items/addItem",[itemsController::class,'setItem']);
Route::put("items/updateItem/{id}",[itemsController::class,'update']);
Route::delete("items/deleteItem/{id}",[itemsController::class,'delete']);

// sales routes
Route::post("sales/addSales",[salesController::class,'setSale']);
Route::get("sales",[salesController::class,'getSales']);
Route::put("sales/updateSale/{id}",[salesController::class,'update']);
Route::delete("sales/deleteSale/{id}",[salesController::class,'delete']);

//user routes
Route::post("user/addUser",[UserController::class,'addUser']);
Route::get("users",[UserController::class,'getUsers']);
});

//Authenticate User
Route::post("login",[UserController::class,'login']);








