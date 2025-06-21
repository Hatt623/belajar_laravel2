<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});

// Route basic
Route::get('about',function(){
   return 'About Page'; 
});

Route::get('profile',function(){
    return view('Profile'); 
});

// Route parameters
Route::get('produk/{NamaProduk}', function ($a){
   return 'Saya membeli produk ' . $a; 
});

Route::get('beli/{barang}/{jumlah}', function ($a, $b){
   return view('beli', compact('a', 'b')); 
});

// Route optional parameters
Route::get('kategori/{namaKategori?}', function ($nama = null){
    if ($nama) {
        return 'anda memilih kategori :' . $nama;
    }

    else {
        return 'anda tidak memilih kategori!';
    } 
});

Route::get('barang/{namaBarang?}/{promo?}', function ($barang = null , $promo = null){
    return view('barang', compact('barang', 'promo')); 
});

// Route siswa
Route::get('siswa', [MyController::class, 'index']);
// Create siswa
Route::get('siswa/create',[MyController::class, 'create']);
Route::post('/siswa', [MyController::class, 'store']);
// Show siswa by id
Route::get('siswa/{id}',[MyController::class, 'show']);
// edit
Route::get('siswa/{id}/edit',[MyController::class, 'edit']);
Route::put('siswa/{id}',[MyController::class, 'update']);
// delete
Route::delete('siswa/{id}',[MyController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route  admin / backend 
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function (){
    Route::get('/', [BackendController::class, 'index']);

});
