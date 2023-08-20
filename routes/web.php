<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlideshowController;

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
//Route::get('/admins/slideshow/slideshowPage', [SlideshowController::class, 'slideshowPage'])->name('admin.slideshow.slideshowPage')->middleware('is_admin');
Route::get('/admins/slideshow/getSlideshow', [SlideshowController::class, 'getSlideshow'])->name('admin.slideshow.get')->middleware('is_admin');

Route::get('/admins/slideshow/endisable/{id}/{action}', [SlideshowController::class, 'enableDisable'])->name('admin.slideshow.enabledisable');
Route::get('/admins/slideshow/moveupdown/{id}/{action}', [SlideshowController::class, 'moveUpDown'])->name('admin.slideshow.moveupdown');
Route::post('/admins/slideshow/delete/{id}', [SlideshowController::class, 'delete'])->name('admin.slideshow.delete');
Route::get('/admins/slideshow/form', [SlideshowController::class, 'form'])->name('admin.slideshow.form');
Route::post('/admins/slideshow/add', [SlideshowController::class, 'add'])->name('admin.slideshow.add');
Route::get('/admins/slideshow/edit/{id}', [SlideshowController::class, 'edit'])->name('admin.slideshow.edit');
Route::post('/admins/slideshow/update', [SlideshowController::class, 'update'])->name('admin.slideshow.update');
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