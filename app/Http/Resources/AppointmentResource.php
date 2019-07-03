<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $appointment = $this->resource;
        $client = $appointment->client;
        $treatment = $appointment->treatment;
        
        $date = $appointment->treatment_start_time->toFormattedDateString();
        $start_time = $appointment->treatment_start_time->toTimeString();

        return [
            'id'                   => $appointment->id,
            'client_id'            => $appointment->client_id,
            'name'                 => $client->name,
            'tel'                  => $client->tel,
            'email'                => $client->email,
            'address'              => $client->address,
            'type'                 => $treatment->type,
            'duration'             => $treatment->duration,
            'price'                => $treatment->price,
            'date'                 => $date,
            'treatment_start_time' => $start_time,
            'treatment_end_time'   => $appointment->treatment_end_time,
        ];
    }
}
