<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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
    return redirect()->route('blog.index');
});

Route::resource('blog/dashboard', BlogController::class)->middleware('auth')->parameters(["dashboard" => "blog"])->scoped(['blog' => 'slug']);
Route::get('blog', [BlogController::class, 'home'])->name('blog.index');
Route::get('blog/{blog}', [BlogController::class, 'detail'])->name('blog.show');

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('register', 'registration')->name('registration')->middleware('guest');
    Route::post('register', 'register')->name('register');
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('login', 'authenticate')->name('auth');
    Route::post('logout', 'logout')->name('logout');
});
