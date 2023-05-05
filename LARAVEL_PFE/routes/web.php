<?php

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
Route::view("/dashboard","dashboard");
Route::view("/categorie/add","categorie/add");
Route::view("/commande","commande/show");
Route::view("/compte","compte/show");
Route::view("/image","image/show");
Route::view("/marque","marque/show");
Route::view("/produit","produit/show");
Route::view("/type","type/show");
Route::view("/user","user/show");