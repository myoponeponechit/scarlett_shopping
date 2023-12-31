<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('items',App\Http\Controllers\ItemController::class);

Route::get('items/categories/{id}',[App\Http\Controllers\ItemController::class,'itemCategory'])->name('item_category');
// Route::get('/items/countDetail', 'ItemController@countDetail')->name('items.countDetail');
Route::get('carts',[App\Http\Controllers\ItemController::class,'itemCart'])->name('item_cart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
