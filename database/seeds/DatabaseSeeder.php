<?php

use App\Client;
use App\Appointment;
use App\Contact;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 10)->create();

        factory(Appointment::class, 10)->create();

        factory(Contact::class, 10)->create();
    }
}
