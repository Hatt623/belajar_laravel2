<?php

use Illuminate\Support\Facades\Route;

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