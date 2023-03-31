<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\inboxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\reservetionController;




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

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('/booking',[App\Http\Controllers\HomeController::class,'store'])->name('booking.store');
Route::resource('inbox',inboxController::class);


Route::get('/dashboard', function () {
    return view('layout.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('slider',sliderController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('item',ItemController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reservetion', [reservetionController::class, 'index'])->name('reservetion.index');
    Route::post('/reservetion/status/{id}', [reservetionController::class, 'status'])->name('reservetion.status');
    Route::delete('/reservetion/delete/{id}', [reservetionController::class, 'destroy'])->name('Reservetion.destroy');


});

require __DIR__.'/auth.php';
