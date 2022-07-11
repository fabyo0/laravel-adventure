<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\LoginController;
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

// blog routes
Route::get('/', [FrontController::class,'index'])->name('index');
Route::get('/about', [FrontController::class,'about'])->name('about');
Route::get('/blog', [FrontController::class,'blog'])->name('blog');
Route::get('/contact', [FrontController::class,'contact'])->name('contact');

//  admin routes
Route::get('admin',function (){
    return view('layouts.admin');
});

//login routes
Route::get('login', [LoginController::class,'showLogin'])->name('login');
Route::post('login',[LoginController::class,'login']);
