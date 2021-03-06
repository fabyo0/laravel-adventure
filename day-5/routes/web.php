<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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

        // category

        Route::resource('category', 'Admin\CategoryController');

        Route::post('/category/changeStatus', [CategoryController::class, 'changeStatus'])
            ->name('admin.category.changeStatus');

        Route::post('/category/delete', [CategoryController::class, 'deleteCategory'])
            ->name('admin.category.delete');

        // tag
        Route::resource('tag', 'Admin\TagController');

        Route::post('/tag/changeStatus', [TagController::class, 'changeStatus'])
            ->name('admin.tag.changeStatus');


        // post
        Route::resource('post','Admin\PostController');
    });
});

//login routes
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
