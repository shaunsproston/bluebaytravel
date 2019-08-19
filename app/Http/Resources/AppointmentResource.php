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
        $start_time = $appointment->treatment_start_time->format('H:i');
        $end_time = $appointment->treatment_end_time->format('H:i');

        return [
            'id'                   => $this->id,
            'user_id'              => $appointment->user,
            'client_id'            => $this->client_id,
            'first_name'           => $client->first_name,
            'last_name'            => $client->last_name,
            'tel'                  => $client->tel,
            'email'                => $client->email,
            'address'              => [
                'house_number'         => $client->house_number,
                'street'               => $client->street,
                'town'                 => $client->town,
                'county'               => $client->county,
                'postcode'             => $client->postcode,
            ],  
            'type'                 => $treatment->type,
            'duration'             => $treatment->duration,
            'price'                => $treatment->price,
            'date'                 => $date,
            'treatment_start_time' => $start_time,
            'treatment_end_time'   => $end_time,
        ];
    }
}
