<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Appointment;


class MoreInfoComposer
{
    public function compose(View $view)
    {
        $view->with('appointments', Appointment::all());
    }
}