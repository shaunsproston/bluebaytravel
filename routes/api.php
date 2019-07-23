<?php

use App\Appointment;
use App\Client;
use App\Treatment;
use App\User;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\TreatmentResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;

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

// Route::middleware('auth')->group(function (Router $router) {

    Route::get('/users/{user}/appointments/{appointment?}', function(User $user, Appointment $appointment = null){
        if ($appointment) {
            return new AppointmentResource($appointment);
        }

        return AppointmentResource::collection($user->appointments);
    });

    Route::get('/formdata', function(){
        return ['data' => [
            'treatments'   => TreatmentResource::collection(Treatment::all()),
            'workingHours' => config('constants.WORKING_HOURS'),
        ]];
    });

// });

// });
