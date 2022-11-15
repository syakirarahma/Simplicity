<?php

class App extends Illuminate\Support\Facades\App {}
class Artisan extends Illuminate\Support\Facades\Artisan {}
class Auth extends Illuminate\Support\Facades\Auth {}

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MeatPackageController;
use App\Http\Controllers\Admin\ArtikelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ArtikelGalleryController;
use App\Http\Controllers\Admin\VideoTutorialController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\MidtransController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home');

Route::get('/aboutus', function(){
    return view('pages/aboutus');
});
Route::get('/user-login', function(){
    return view('pages/login');
});
Route::get('/user-register', function(){
    return view('pages/register');
});

Route::get('/my-account', function(){
    return view('pages/myaccount');
});

Route::get('/my-order', 'App\Http\Controllers\MyOrderController@index')
    ->name('my-order');

Route::get('/my-cart', 'App\Http\Controllers\CartController@index')
    ->name('my-cart');
    
Route::get('/detail-order', function(){
    return view('pages/detail_order');
});
Route::get('/checkout-order', function(){
    return view('pages/checkout');
});

Route::get('/detail-artikel', function(){
    return view('pages/detail_artikel');
});

Route::get('/article', function(){
    return view('pages/artikel');
});
    
    Route::get('/video', 'App\Http\Controllers\VideoController@index')
    ->name('video');
    
    Route::get('/product', 'App\Http\Controllers\ProductController@index')
    ->name('product');
    
    Route::get('/article', 'App\Http\Controllers\ArtikelController@index')
    ->name('article');
    
    Route::get('/detail_produk/{slug}', 'App\Http\Controllers\DetailController@index')
    ->name('detail_produk');

    Route::get('/order/{id}', 'App\Http\Controllers\OrderController@index')
    ->name('order');

Route::get('/detail_video/{slug}', 'App\Http\Controllers\DetailVideoController@index')
    ->name('detail_video');

Route::get('/detail_artikel/{slug}', 'App\Http\Controllers\DetailArtikelController@index')
    ->name('detail_artikel');

Route::get('/detail-order/{slug}', 'App\Http\Controllers\DetailOrderController@index')
    ->name('detail-order');
    
Route::post('/checkout/{id}', 'App\Http\Controllers\CheckoutController@process')
    ->name('checkout_process')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/{id}', 'App\Http\Controllers\CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'App\Http\Controllers\CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth', 'verified']);

Route::post('/checkout/remove/{detail_id}', 'App\Http\Controllers\CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{id}', 'App\Http\Controllers\CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth', 'verified']);

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')
            ->name('dashboard');

        Route::resource('meat-package', MeatPackageController::class);
        Route::resource('artikel-package', ArtikelPackageController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('artikel-gallery', ArtikelGalleryController::class);
        Route::resource('video-tutorial', VideoTutorialController::class);
        Route::resource('transaction', TransactionController::class);
    });
    
Auth::routes(['verify' => true]);
// Auth::routes();

//Midtrans
Route::post('/midtrans/callback', 'App\Http\Controllers\MidtransController@notificationHandler');
Route::get('/midtrans/finish', 'App\Http\Controllers\MidtransController@finishRedirect');
Route::get('/midtrans/unfinish', 'App\Http\Controllers\MidtransController@unfinishRedirect');
Route::get('/midtrans/error', 'App\Http\Controllers\MidtransController@errorRedirect');

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Configuration cache cleared! <br> Configuration cached successfully!';
});

Route::get('/config-clear', function() {
    Artisan::call('config:clear'); 
    return 'Configuration cache cleared!';
});