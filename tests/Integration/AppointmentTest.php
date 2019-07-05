<?php

namespace Tests\Integration;

use App\Appointment;
use App\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\AbstractTestCase;

class AppointmentTest extends AbstractTestCase
{
    use DatabaseMigrations;

    public function testClientRelation()
    {
        $client = factory(Client::class)->create();
        $appointment = factory(Appointment::class)->create(['client_id' => $client->id]);

        $this->assertEquals($client->id, $appointment->client->id);
    }
}
