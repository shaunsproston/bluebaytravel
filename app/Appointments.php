<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'client_id', 
        'date_time',
        'type',
        'price',
    ];
}
