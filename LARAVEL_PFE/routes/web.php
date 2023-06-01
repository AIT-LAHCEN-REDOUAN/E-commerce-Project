<?php

use App\Http\Controllers\adminController\CategoryController;
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

    Route::get("/product_index","index")->name("product.index");
    Route::get("/product_create","create")->name("product.create");
    Route::get("/product_index","store")->name("product.store");
    Route::get("/product_index/{id}","show")->name("product.show");
    Route::get("/product_index/{id}/edit","edit")->name("product.edit");
    Route::put("product_index/{id}","update")->name("product.update");
    Route::delete("/product_index/{id}","destroy")->name("product.destroy");
});
//------------------Categorie Routes-------------------------
Route::controller(CategoryController::class)->group(function (){
    Route::get("/category_index","index")->name("category.index");
    Route::get("/category_create","create")->name("category.create");
    Route::post("/category_index","store")->name("category.store");
    Route::get("/category_index/{id}","show")->name("category.show");
    Route::get("/category_edit/{id}","edit")->name("category.edit");
    Route::put("/category_index/{id}","update")->name("category.update");
    Route::delete("/category_index/{id}","destroy")->name("category.destroy");
});
//-----------------------Commande Routes--------------------------
Route::controller()->group(function (){
    Route::get("/command_index","index")->name("command.index");
    Route::get("/command_create","create")->name("command.create");
    Route::post("/command_index","store")->name("command.store");
    Route::get("/command_index/{id}","show")->name("command.show");
    Route::get("/command_index/{id}/edit","edit")->name("command.edit");
    Route::put("/command_index/{id}","update")->name("command.update");
    Route::delete("/command_index/{id}","destroy")->name("command.destroy");
});
//---------------------Compte Routes---------------------------
Route::controller()->group(function (){
    Route::get("/compte_index","index")->name("compte.index");
    Route::get("/compte_create","create")->name("compte.create");
    Route::post("/compte_index","store")->name("compte.store");
    Route::get("/compte_index/{id}","show")->name("compte.show");
    Route::get("/compte_index/{id}/edit","edit")->name("compte.edit");
    Route::put("/compte_index/{id}","update")->name("compte.update");
    Route::delete("/compte_index/{id}","destroy")->name("compte.destroy");
});
//---------------------Type Routes---------------------
Route::controller()->group(function (){
    Route::get("type_index","index")->name("type.index");
    Route::get("type_create","create")->name("type.create");
    Route::post("type_index","store")->name("type.store");
    Route::get("type_index/{id}","show")->name("type.show");
    Route::get("type_index/{id}/edit","edit")->name("type.edit");
    Route::put("type_index/{id}","update")->name("type.update");
    Route::delete("type_index/{id}","destroy")->name("type.destroy");
});

//-------------------------User------------------------------
Route::controller()->group(function (){
    Route::get("user_index","index")->name("user.index");
    Route::get("user_create","create")->name("user.create");
    Route::post("user_index","store")->name("user.store");
    Route::get("user_index/{id}","show")->name("user.show");
    Route::get("user_index/{id}/edit","edit")->name("user.edit");
    Route::put("user_index/{id}","update")->name("user.update");
    Route::delete("user_index/{id}","destroy")->name("user.destroy");
});
