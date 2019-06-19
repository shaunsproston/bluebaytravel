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
        return $this->hasMany(Appointments::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }
}
