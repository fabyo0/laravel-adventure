<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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

//TODO: Route name vererek name kullanabiliriz

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*Route::get('/hello', function () {
    return view('front/index');
});*/

//TODO: routemzı da array olarak controller sınıfımızı çağırabilir
// route/class/function

Route::get('/front', [HomeController::class, 'index'])->name('index');

Route::get('/about',[AboutController::class,'about'])->name('about');

Route::get('/contact',[ContactController::class,'contact'])->name('contact');
