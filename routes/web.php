<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\MyController;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

// Route member / Guest
Route::get('/',[FrontendController::class, 'index']);

Route::get('/product',[FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleproduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about',[FrontendController::class, 'about']);
    // cart
Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    // orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    // Review
Route::post('/product/{product}/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store'); 

// Akhir route member/guest

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Force logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


// Route  admin / backend 
Route::group(['prefix' => 'admin','as' => 'backend.', 'middleware' => ['auth', Admin::class]], function (){
    Route::get('/', [BackendController::class, 'index']);

    // crud
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', BackendOrderController::class);
    Route::put('/orders/{id}/status', [BackendOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});



// Route basic
    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // Route::get('about',function(){
    //    return 'About Page'; 
    // });

    // Route::get('profile',function(){
    //     return view('Profile'); 
    // });

    // // Route parameters
    // Route::get('produk/{NamaProduk}', function ($a){
    //    return 'Saya membeli produk ' . $a; 
    // });

    // Route::get('beli/{barang}/{jumlah}', function ($a, $b){
    //    return view('beli', compact('a', 'b')); 
    // });

    // // Route optional parameters
    // Route::get('kategori/{namaKategori?}', function ($nama = null){
    //     if ($nama) {
    //         return 'anda memilih kategori :' . $nama;
    //     }

    //     else {
    //         return 'anda tidak memilih kategori!';
    //     } 
    // });

    // Route::get('barang/{namaBarang?}/{promo?}', function ($barang = null , $promo = null){
    //     return view('barang', compact('barang', 'promo')); 
    // });

    // // Route siswa
    // Route::get('siswa', [MyController::class, 'index']);
    // // Create siswa
    // Route::get('siswa/create',[MyController::class, 'create']);
    // Route::post('/siswa', [MyController::class, 'store']);
    // // Show siswa by id
    // Route::get('siswa/{id}',[MyController::class, 'show']);
    // // edit
    // Route::get('siswa/{id}/edit',[MyController::class, 'edit']);
    // Route::put('siswa/{id}',[MyController::class, 'update']);
    // // delete
    // Route::delete('siswa/{id}',[MyController::class, 'destroy']);
// Akhir Route basic
