<?php

use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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


// End points - acabo de agregar este comentario

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');

// Envio a un servidor informacion 
Route::post('/crear-cuenta', [RegisterController::class, 'store']);


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LogoutController::class, 'store'])->name('logout');


Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');