<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostsContoller;

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

//Route::get('/', function () {
//    return view('index');
//});

//TODO: match methodu ile belirledğimiz istek türüne eşleştirebiliriz
//Route::match(['get','post'],'/test', [TestController::class,'index']);

//Put türü ile ilgili kaydın güncelleme işlemini yaparız
Route::put('/test',[TestController::class,'guncelle'])->name('guncelle');

// Silme işlemleri
Route::delete('/test-sil',[TestController::class,'sil'])->name('sil');

// Gönderilen isteği önemli olmadığı durumlarda any kullanabiliriz
Route::any('/test-any',[TestController::class,'anyTest'])->name('anyTest');

// bir adet route tanımlayıp tüm crud işlemlerini yapabiliriz
// only  ile belirli methodları kullanabiliriz
//Route::resource('posts', TestController::class)->only(['index','create']);
// except ile array içerindeki methodlar dışındaki kullanmak isteiğimizi belirtiriz
//Route::resource('posts', TestController::class)->except(['index','create']);
// api
//Route::apiResource('posts',TestController::class);

// Route üzerinde paramtere gönderme
//TODO: parametreden sonra '?' opsiyonel bir parametre olduğunu belirtiriz
Route::get('/post/{lang}/{id?}',[PostsContoller::class,'getPost']);
