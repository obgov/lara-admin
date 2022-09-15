<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function(){
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/register', [RegisterController::class, 'index']);

    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/test', [LoginController::class, 'test']);
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/goods', [ProductsController::class, 'index'])->name('products');
});

