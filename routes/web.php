<?php

use App\Http\Controllers\MascotasController;
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

Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/mascotas', function () {
return view('mascotas.index');
});
Route::get('/mascotas/create',[MascotasController::class,'create']);
 */

Route::resource('mascotas', MascotasController::class)->middleware('auth');
Auth::routes(['reset' => false]);

Route::get('/home', [MascotasController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [MascotasController::class, 'index'])->name('home');
});
