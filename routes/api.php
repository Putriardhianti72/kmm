<?php
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Buku', 'App\Http\Controllers\ApiBukuController@index');
Route::post('/Buku', 'App\Http\Controllers\ApiBukuController@create');
Route::put('/Buku/{id}', 'App\Http\Controllers\ApiBukuController@update');
Route::delete('/Buku/{id}', 'App\Http\Controllers\ApiBukuController@destroy');