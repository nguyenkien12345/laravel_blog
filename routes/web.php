<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthAdminUserController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Web\WebController;

// START DỰ ÁN BLOG
Route::prefix('admin')->group(function () {
    Route::get('show-login', [AuthAdminUserController::class, 'showlogin'])->name('admin.auth.show-login');
    Route::post('check-login', [AuthAdminUserController::class, 'checkLogin'])->name('admin.auth.check-login');
});

Route::prefix('admin')->middleware('check-auth-admin')->group(function () {

    Route::get('logout-admin', [AuthAdminUserController::class, 'logout'])->name('admin.auth.logout-admin');

    Route::prefix('profile')->group(function () {
        Route::get('', [AuthAdminUserController::class, 'profile'])->name('admin.profile.index');
        Route::put('update', [AuthAdminUserController::class, 'updateProfile'])->name('admin.profile.update');
    });

    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('admin.category.index');

        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('post')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('admin.post.index');

        Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('store', [PostController::class, 'store'])->name('admin.post.store');

        Route::get('edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');

        Route::get('delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('admin.user.index');

        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('store', [UserController::class, 'store'])->name('admin.user.store');

        Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('admin.user.update');

        Route::get('delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('contact')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
    });
});

Route::get('/show-login', [WebController::class, 'showLogin'])->name('show-login');
Route::post('/check-login', [WebController::class, 'checkLogin'])->name('check-login');

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/category', [WebController::class, 'category'])->name('category');
Route::get('/category/{slug}', [WebController::class, 'categoryPost'])->name('category.post');

Route::get('/post/{slug}', [WebController::class, 'postDetail'])->name('post.detail');

Route::post('/post/comment/{id}', [WebController::class, 'comment'])->name('post.comment');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::post('/contact', [WebController::class, 'sendContact'])->name('send-contact');
// END DỰ ÁN BLOG

// Start Demo PDF
route::get('pdf-download', [PdfController::class, 'download'])->name('pdf-download');
// End Demo PDF
