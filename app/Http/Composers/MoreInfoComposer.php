<?php

namespace App\Http\Composers;

use App\Appointment;
use Illuminate\View\View;

class MoreInfoComposer
{
    public function compose(View $view)
    {
        $view->with('appointments', Appointment::all());
    }
}
