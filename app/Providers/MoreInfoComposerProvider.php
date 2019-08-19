<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MoreInfoComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeMoreInfo();
    }

    public function composeMoreInfo() 
    {
        View::composer('layouts.app', 'App\Http\Composers\MoreInfoComposer');
    }
}
