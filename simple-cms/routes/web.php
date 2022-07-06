<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;

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

Route::get('/front', [FrontController::class, 'index'])->name('index');

Route::view('/welcome', 'welcome');

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

//TODO: Routelarımızı base url altında gruplaya biliriz - group middleware ekleyerek authentication yapabiliriz

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/add-post', [HomeController::class, 'showAddPost'])->name('showAddPost');
    Route::post('/add-post', [HomeController::class, 'addPost']);
});
