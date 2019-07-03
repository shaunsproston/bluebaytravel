<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable._
     *
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'treatment_id',
        'treatment_start_time',
    ];

    protected $casts = [
        'treatment_start_time' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treatment(): BelongsTo
    {
        return $this->belongsTo(Treatment::class);
    }

    public function getTreatmentEndTimeAttribute()
    {
        return $this->treatment_start_time->addMinutes($this->treatment->duration)->format('h:i a');
    }


}
