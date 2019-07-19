<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function appointments(): hasMany
    {
        return $this->hasMany(Appointment::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function clients(): hasMany
    {
        return $this->hasMany(Client::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function treatments(): hasMany
    {
        return $this->hasMany(Treatment::class);
    }
}