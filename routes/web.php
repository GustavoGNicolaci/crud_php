<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::resource('/', ProdutoController::class);
Route::resource('categorias', CategoriaController::class);

