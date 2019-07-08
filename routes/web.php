<?php


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

Route::get('/', 'Controller@index')->name('home');

Route::get('/bookingForm', 'Controller@bookingForm');

Route::resource('bookings', 'BookingFormController');

Route::prefix('appointments')->group(function () {
    Route::get('/', 'Controller@data')->name('appointments');
    Route::get('/moreinfo/{appointment}', 'Controller@moreInfo');
});