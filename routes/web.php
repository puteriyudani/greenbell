<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\CatatanOrangtuaController;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HadistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IslamicController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MorningController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PoopPeeController;
use App\Http\Controllers\PreschoolController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\RecallingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TematikController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/store/product-detail/{product}', [StoreController::class, 'productDetail'])->name('product-detail');
Route::get('/store/beleaf', [StoreController::class, 'beleaf'])->name('store.beleaf');
Route::get('/store/preloved', [StoreController::class, 'preloved'])->name('store.preloved');
Route::get('/store/general', [StoreController::class, 'general'])->name('store.general');

Auth::routes();

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // home admin
    Route::get('/admin-greenbell', [AdminController::class, 'index'])->name('admin');

    // kategori
    Route::resource('kategori', KategoriController::class);

    // product
    Route::resource('product', ProductController::class);
    Route::get('product/{product}/image', [ProductImageController::class, 'index'])->name('product-image.index');
    Route::get('product/{product}/image/create', [ProductImageController::class, 'create'])->name('product-image.create');
    Route::post('product/{product}/image', [ProductImageController::class, 'store'])->name('product-image.store');
    Route::delete('product/image/{image}/delete', [ProductImageController::class, 'destroy'])->name('product-image.destroy');
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

});
