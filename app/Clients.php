<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointments');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contacts');
    }
}
