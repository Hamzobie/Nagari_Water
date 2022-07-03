<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDcontroller;

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/add', function () {
    return view('addData');
});


Auth::routes();

Route::get('/', [CRUDcontroller::class, 'showPelanggan']);
Route::get('/admin', [CRUDcontroller::class, 'showAdmin']);
Route::post('/addData', [CRUDcontroller::class, 'addView']);
Route::get('/{id}', [CRUDcontroller::class, 'editView']);
Route::patch('/{id}', [CRUDcontroller::class, 'editPush']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('admin/{id}',[CRUDcontroller::class, 'deleteView']);
