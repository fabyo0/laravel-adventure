<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

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
Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

//  admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/view-profile', [AdminController::class, 'viewProfile'])
        ->name('admin.viewProfile');
    Route::put('/view-profile', [AdminController::class, 'viewProfileUpdate']);

    // admin posts
    Route::prefix('post')->group(function () {
        Route::get('/add', function () {
            return view('admin.post_add');
        })->name('admin.post.add');

        Route::get('/list', function () {
            return view('admin.post_list');
        })->name('admin.post.list');

        Route::get('/tags',function (){
           return view('admin.tag_list');
        })->name('admin.tag.list');

        Route::get('/categories',function (){
            return view('admin.category_list');
        })->name('admin.categories.list');

    });

});

//login routes
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
