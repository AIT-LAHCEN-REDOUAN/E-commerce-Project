<?php

use App\Http\Controllers\adminController\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view("/admin","admin")->name("admin");
Route::view("/layout","layouts");

// Route::get("/compte",[UserController::class,'compte']);


//-------------Product Routes------------------

Route::controller(ProductController::class)->group(function (){
    Route::get("/product_index","index");
    Route::get("/product_create","create");
    Route::post("/product_index","store");
    Route::get("/product_index/{id}","show");
    Route::get("/product_index/{id}/edit","edit");
    Route::put("product_index/{id}","update");
    Route::delete("/product_index/{id}","destroy");
});
//------------------Categorie Routes-------------------------
Route::controller()->group(function (){
    Route::get("/category_index","index");
    Route::get("/category_create","create");
    Route::post("/category_index","store");
    Route::get("/category_index/{id}","show");
    Route::get("/category_index/{id}/edit","edit");
    Route::put("/category_index/{id}","update");
    Route::delete("/category_index/{id}","destroy");
});
//-----------------------Commande Routes--------------------------
Route::controller()->group(function (){
    Route::get("/command_index","index");
    Route::get("/command_create","create");
    Route::post("/command_index","store");
    Route::get("/command_index/{id}","show");
    Route::get("/command_index/{id}/edit","edit");
    Route::put("/command_index/{id}","update");
    Route::delete("/command_index/{id}","destroy");
});
//---------------------Compte Routes---------------------------
Route::controller()->group(function (){
    Route::get("/compte_index","index");
    Route::get("/compte_create","create");
    Route::post("/compte_index","store");
    Route::get("/compte_index/{id}","show");
    Route::get("/compte_index/{id}/edit","edit");
    Route::put("/compte_index/{id}","update");
    Route::delete("/compte_index/{id}","destroy");
});
//---------------------Type Routes---------------------
Route::controller()->group(function (){
    Route::get("type_index","index");
    Route::get("type_create","create");
    Route::post("type_index","store");
    Route::get("type_index/{id}","show");
    Route::get("type_index/{id}/edit","edit");
    Route::put("type_index/{id}","update");
    Route::delete("type_index/{id}","destroy");
});

//-------------------------User------------------------------
Route::controller()->group(function (){
    Route::get("user_index","index");
    Route::get("user_create","create");
    Route::post("user_index","store");
    Route::get("user_index/{id}","show");
    Route::get("user_index/{id}/edit","edit");
    Route::put("user_index/{id}","update");
    Route::delete("user_index/{id}","destroy");
});
