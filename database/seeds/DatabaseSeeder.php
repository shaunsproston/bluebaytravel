<?php

use App\User;
use App\Appointments;
use App\Contacts;

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
        factory(User::class, 10)->create();

        factory(Appointments::class, 10)->create();

        factory(Contacts::class, 10)->create();
    }
}
