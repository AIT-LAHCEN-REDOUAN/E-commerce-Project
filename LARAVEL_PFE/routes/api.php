<?php

use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware'=>['auth:sanctum']],function(){
Route::get('/profile',[UserController::class,'profile']);
Route::get('/logout',[UserController::class,'logout']);
});
Route::resource('/produit',ProduitController::class);
Route::resource('/marque',MarqueController::class);
Route::get('/type/{categorie}',[TypeController::class,'index']);
Route::resource('/message',MessageController::class);
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

