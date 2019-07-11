<?php

use Illuminate\Http\Request;
use App\Appointment;
use App\Http\Resources\AppointmentResource;

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

// Route::middleware('auth:api')->group(function (Request $request) {
//    Route::get('/data', function(){
//       return Appointment::all()->load(['client', 'treatment']);
//    });

    Route::get('/data', function(){
       return AppointmentResource::collection(Appointment::all());
    });
// });
