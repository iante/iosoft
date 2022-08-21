<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

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
})->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/user/book/car', [BookingController::class, 'index'])->name('user.book.car')->middleware('role:user');
    Route::get('/user/track/progress', [BookingController::class, 'track'])->name('user.track.progress')->middleware('role:user');
    Route::post('/user/process/booking', [BookingController::class, 'processService'])->name('user.process.booking');

    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','role:admin']], function() {
//ADMIN ROUTES
Route::get('/admin/reject/booking/service/{id}', [BookingController::class, 'rejectBookedCar'])->name('reject.booking.service');
Route::get('/admin/approve/booking/service/{id}', [BookingController::class, 'approveBookedCar'])->name('approve.booking.service');
Route::get('/admin/delete/booking/service/{id}', [BookingController::class, 'deleteBookedCar'])->name('delete.booking.service');

});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
