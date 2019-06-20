<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'date_time', 
        'type', 
        'price',
        'duration',
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
