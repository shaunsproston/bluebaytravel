<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'client_id', 'date_time', 'type', 'price','duration',
    ];    
}
