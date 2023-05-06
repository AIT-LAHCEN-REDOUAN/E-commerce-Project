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
Route::view("/categorie","categorie/add");
Route::view("/commande","commande/add");
Route::view("/compte","compte/add");
Route::view("/image","image/add");
Route::view("/marque","marque/add");
Route::view("/produit","produit/add");
Route::view("/type","type/add");
Route::view("/user","user/add");