<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware("auth")->group(function (){
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::get('order/report', [OrderController::class, 'report'])->name('order.report');
    Route::post('order/report-preview', [OrderController::class, 'reportPreview'])->name('view-pdf');
    Route::get('order/report-download', [OrderController::class, 'reportDownload'])->name('order.report-download');
    Route::resource('order', OrderController::class);
    Route::resource('order.item', OrderItemController::class)->except(["index"]);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');