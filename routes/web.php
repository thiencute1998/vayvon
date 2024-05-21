<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\VayVonController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\LogoController;
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

//Admin
Route::get('admin/login', [AuthController::class, 'index'])->name('login-index');

Route::post('admin/login', [AuthController::class, 'login'])->name('login-auth');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout-auth');

Route::prefix('admin')->middleware(['checkLogin'])->group(function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin-index');

    Route::prefix('configs')->group(function () {
        Route::get('/', [ConfigController::class, 'index'])->name('configs');
        Route::post('/update', [ConfigController::class, 'update'])->name('configs-update');
    });

    Route::prefix('product')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('admin-product');
        Route::get('/create', [ProductController::class, 'create'])->name('admin-product-create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin-product-store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin-product-edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin-product-update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin-product-delete');
    });

    Route::prefix('application')->group(function() {
        Route::get('/', [ApplicationController::class, 'index'])->name('admin-application');
        Route::get('/create', [ApplicationController::class, 'create'])->name('admin-application-create');
        Route::post('/store', [ApplicationController::class, 'store'])->name('admin-application-store');
        Route::get('/edit/{id}', [ApplicationController::class, 'edit'])->name('admin-application-edit');
        Route::post('/update/{id}', [ApplicationController::class, 'update'])->name('admin-application-update');
        Route::get('/delete/{id}', [ApplicationController::class, 'delete'])->name('admin-application-delete');
    });

    Route::prefix('quote')->group(function () {
        Route::get('/', [QuoteController::class, 'index'])->name('admin-quote');
        Route::get('/view/{id}', [QuoteController::class, 'view'])->name('admin-quote-view');
        Route::get('/delete/{id}', [QuoteController::class, 'delete'])->name('admin-quote-delete');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('admin-about');
        Route::post('/update', [AboutController::class, 'update'])->name('admin-about-update');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin-contact');
        Route::get('/view/{id}', [ContactController::class, 'view'])->name('admin-contact-view');
        Route::get('/delete/{id}', [ContactController::class, 'delete'])->name('admin-contact-delete');
    });

    Route::prefix('slide')->group(function() {
        Route::get('/', [SlideController::class, 'index'])->name('admin-slide');
        Route::get('/create', [SlideController::class, 'create'])->name('admin-slide-create');
        Route::post('/store', [SlideController::class, 'store'])->name('admin-slide-store');
        Route::get('/edit/{id}', [SlideController::class, 'edit'])->name('admin-slide-edit');
        Route::post('/update/{id}', [SlideController::class, 'update'])->name('admin-slide-update');
        Route::get('/delete/{id}', [SlideController::class, 'delete'])->name('admin-slide-delete');
    });

    Route::prefix('certificate')->group(function() {
        Route::get('/', [CertificateController::class, 'index'])->name('admin-certificate');
        Route::get('/create', [CertificateController::class, 'create'])->name('admin-certificate-create');
        Route::post('/store', [CertificateController::class, 'store'])->name('admin-certificate-store');
        Route::get('/edit/{id}', [CertificateController::class, 'edit'])->name('admin-certificate-edit');
        Route::post('/update/{id}', [CertificateController::class, 'update'])->name('admin-certificate-update');
        Route::get('/delete/{id}', [CertificateController::class, 'delete'])->name('admin-certificate-delete');
    });

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/create', [UserController::class, 'create'])->name('users-create');
        Route::post('/store', [UserController::class, 'store'])->name('users-store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users-edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users-update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users-delete');
    });

    Route::prefix('vay-von')->group(function() {
        Route::get('/', [VayVonController::class, 'index'])->name('admin-vayvon');
        Route::get('/create', [VayVonController::class, 'create'])->name('admin-vayvon-create');
        Route::post('/store', [VayVonController::class, 'store'])->name('admin-vayvon-store');
        Route::get('/edit/{id}', [VayVonController::class, 'edit'])->name('admin-vayvon-edit');
        Route::post('/update/{id}', [VayVonController::class, 'update'])->name('admin-vayvon-update');
        Route::get('/delete/{id}', [VayVonController::class, 'delete'])->name('admin-vayvon-delete');
        Route::delete('/delete-all', [VayVonController::class, 'deleteAll'])->name('admin-vayvon-delete-all');
        Route::post('/import', [VayVonController::class, 'import'])->name('admin-vayvon-import');
    });

    Route::prefix('logos')->group(function() {
        Route::get('/', [LogoController::class, 'index'])->name('logos');
        Route::get('/create', [LogoController::class, 'create'])->name('logos-create');
        Route::post('/store', [LogoController::class, 'store'])->name('logos-store');
        Route::get('/edit/{id}', [LogoController::class, 'edit'])->name('logos-edit');
        Route::post('/update/{id}', [LogoController::class, 'update'])->name('logos-update');
        Route::get('/delete/{id}', [LogoController::class, 'delete'])->name('logos-delete');
    });

});





// Viewer
//Route::get('/', [IndexController::class, 'index'])->name('index');
//Route::get('/request-a-quote', [IndexController::class, 'quote'])->name('quote');
//Route::post('/request-quote', [IndexController::class, 'requestQuote'])->name('request-quote');
//Route::get('/about', [IndexController::class, 'about'])->name('about');
//Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
//Route::post('/send-contact', [IndexController::class, 'sendContact'])->name('send-contact');
//Route::get('/{slug}', [IndexController::class, 'slug'])->name('slug');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/dang-nhap-thanh-toan', [IndexController::class, 'getPay'])->name('get-pay');
Route::post('/dang-nhap-thanh-toan', [IndexController::class, 'postPay'])->name('post-pay');
