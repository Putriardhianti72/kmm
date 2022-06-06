<?php

use App\Http\Controllers\CDashboard;
use App\Http\Controllers\CBuku;
use App\Http\Controllers\CUser;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Product;
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
Route::get('/', function(){
    return view('Dashboard');
});


Route::get('/Dashboard', [CDashboard::class, 'index']);
Route::resource('Buku', CBuku::class);
Route::resource('User', CUser::class);
Route::get('/Product', 'App\Http\Controllers\TransaksiController@index');
Route::get('/cart/tambah/{id}', 'App\Http\Controllers\TransaksiController@do_tambah_cart')->where("id","[0-9]+");
Route::get('/cart', 'App\Http\Controllers\TransaksiController@cart');
Route::get('/cart/hapus/{id}', 'App\Http\Controllers\TransaksiController@do_hapus_cart')->where("id","[0-9]+");
Route::get('/transaksi/tambah', 'App\Http\Controllers\TransaksiController@do_tambah_transaksi');
