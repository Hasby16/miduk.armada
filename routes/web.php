<?php

use App\Http\Controllers\KapalController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\Home;
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

Route::get('/', Home::class)->name('/');

Route::get('contact', ContactUs::class)->name('contact-us');
Route::get('daftar-kapal', 'App\Http\Controllers\KapalController@listKapal')->name('daftar-kapal');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UsersController::class);
    Route::resource('kapal', KapalController::class);
    Route::resource('pembayaran', PembayaranController::class)->except(['create']);
    Route::resource('sewa', SewaController::class)->except(['create']);

    Route::get('sewa/{kapal}/{pages}', 'App\Http\Controllers\SewaController@create')->name('kapal.sewa.create');
    Route::put('sewa/tolak/{sewa}', 'App\Http\Controllers\SewaController@tolakPengajuan')->name('sewa.tolak');
    Route::get('pembayaran/sewa/{sewa}', 'App\Http\Controllers\PembayaranController@create')->name('pembayaran.sewa.create');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
