<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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

        return [
            'name'                 => $client->name,
            'tel'                  => $client->tel,
            'email'                => $client->email,
            'address'              => $client->address,
            'type'                 => $treatment->type,
            'duration'             => $treatment->duration,
            'price'                => $treatment->price,
            'treatment_start_time' => $appointment->treatment_start_time
        ];
    }
}
