<?php

use App\Clients;
use App\Appointments;
use App\Contacts;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Clients::class, 10)->create();
        
        factory(Appointments::class, 10)->create();

        factory(Contacts::class, 10)->create();
        
    }
}
