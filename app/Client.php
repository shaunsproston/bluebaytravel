<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        return $this->hasMany(Appointment::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
