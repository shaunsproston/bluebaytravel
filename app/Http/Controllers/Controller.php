<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Appointment;
use App\Client;
use App\Treatment;
use App\Http\Resources\AppointmentResource;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {   
        return view('index');
    }

    public function data()
    {   
        return view('data');
    }

    public function bookingForm()
    {   
        return view('bookingform');
    }

    public function moreInfo(Appointment $appointment)
    {   
        return view('moreinfo')
            ->withData($appointment);
    }

}
