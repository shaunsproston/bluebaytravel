<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use App\Appointment;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {   
        return View::make('index');
    }

    public function data()
    {   
        return View::make('data');
    }

    public function bookingForm()
    {
        return View::make('bookingform')->withTreatments(Treatment::all());
    }

    public function moreInfo(Appointment $appointment)
    {   
        return View::make('moreinfo')
            ->withData($appointment);
    }

}
