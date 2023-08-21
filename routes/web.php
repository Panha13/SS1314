<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [MyHomeController::class, 'index']);
Route::get('/shop', [MyHomeController::class, 'shop']);

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admins', [AdminController::class, 'index'])->middleware('is_admin');
//Route::get('/login', [AdminController::class, 'login'])->name('login');
Auth::routes();

Route::get('/admins/slideshow', [SlideshowController::class, 'index'])->name('admin.slideshow')->middleware('is_admin');
Route::get('/admins/slideshow/getSlideshow', [SlideshowController::class, 'getSlideshow'])->name('admin.slideshow.get')->middleware('is_admin');
Route::get('/admins/slideshow/endisable/{id}/{action}', [SlideshowController::class, 'enableDisable'])->name('admin.slideshow.enabledisable');
Route::get('/admins/slideshow/moveupdown/{id}/{action}', [SlideshowController::class, 'moveUpDown'])->name('admin.slideshow.moveupdown');
Route::post('/admins/slideshow/delete/{id}', [SlideshowController::class, 'delete'])->name('admin.slideshow.delete');
Route::get('/admins/slideshow/form', [SlideshowController::class, 'form'])->name('admin.slideshow.form');
Route::post('/admins/slideshow/add', [SlideshowController::class, 'add'])->name('admin.slideshow.add');
Route::get('/admins/slideshow/edit/{id}', [SlideshowController::class, 'edit'])->name('admin.slideshow.edit');
Route::post('/admins/slideshow/update', [SlideshowController::class, 'update'])->name('admin.slideshow.update');

// Product
Route::get('/admins/product', [ProductController::class, 'index'])->name('admin.product')->middleware('is_admin');
Route::get('/admins/product/getProduct', [ProductController::class, 'getProduct'])->name('admin.product.get')->middleware('is_admin');

// Route::get('/my-data', 'MyHomeController@getData');

// Route::get('language/{locale}', function ($locale) {
//     app()->setLocale($locale);
//     session()->put('locale', $locale);

//     return redirect()->back();
// });
Route::auth();
Route::post('language', function (Request $request) {
    $locale = $request->input('locale');
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('change.language');

Route::get('admins/slideshow/slideshowform', function () {
    return view('admin.slideshow.slideshowform');});

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');

//category
Route::group(['prefix' => 'admins/category', 'middleware' => 'is_admin', 'as' => 'admin.category.'], function () {
    Route::get('/', [CategoryController::class, 'listAll'])->name('listAll');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    Route::post('/add', [CategoryController::class, 'add'])->name('add');
    Route::post('/update', [CategoryController::class, 'update'])->name('update');
});


//group route product
Route::group(['prefix' => 'admins/product', 'middleware' => 'is_admin', 'as' => 'admin.product.'], function () {
    Route::get('/', [ProductController::class, 'listAll'])->name('listAll');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    Route::post('/add', [ProductController::class, 'add'])->name('add');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/update', [ProductController::class, 'update'])->name('update');
});

//end route product