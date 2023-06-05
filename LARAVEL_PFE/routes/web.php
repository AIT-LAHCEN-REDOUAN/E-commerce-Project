<?php

use App\Http\Controllers\adminController\CategoryController;
use App\Http\Controllers\adminController\CommandeController;
use App\Http\Controllers\adminController\CompteController;
use App\Http\Controllers\adminController\marqueController;
use App\Http\Controllers\adminController\ProductController;
use App\Http\Controllers\adminController\TypeController;
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
    Route::post("/product_index","store")->name("product.store");
    Route::get("/product_edit/{id}","edit")->name("product.edit");
    Route::get("/product_update/{id}","update")->name("product.update");
    Route::get("/product_index/{id}","destroy")->name("product.destroy");
});
//------------------Categorie Routes-------------------------
Route::controller(CategoryController::class)->group(function (){
    Route::get("/category_index","index")->name("category.index");
    Route::get("/category_create","create")->name("category.create");
    Route::post("/category_index","store")->name("category.store");
    Route::get("/category_edit/{id}","edit")->name("category.edit");
    Route::get("/category_update/{id}","update")->name("category.update");
    Route::get("/category_index/{id}","destroy")->name("category.destroy");
});
//-----------------------Commande Routes--------------------------
Route::controller(CommandeController::class)->group(function (){
    Route::get("/command_index","index")->name("command.index");
    Route::get("/command_index/{id}","destroy")->name("command.destroy");
});
//---------------------Compte Routes---------------------------
Route::controller(CompteController::class)->group(function (){
    Route::get("/compte_index","index")->name("compte.index");
    Route::get("/compte_index/{email}","destroy")->name("compte.destroy");
});
//---------------------Type Routes---------------------
Route::controller(TypeController::class)->group(function (){
    Route::get("/type_index","index")->name("type.index");
    Route::get("/type_create","create")->name("type.create");
    Route::post("/type_index","store")->name("type.store");
    Route::get("/type_edit/{id}","edit")->name("type.edit");
    Route::get("/type_update/{id}","update")->name("type.update");
    Route::get("/type_index/{id}","destroy")->name("type.destroy");
});