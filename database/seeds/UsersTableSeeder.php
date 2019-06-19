<?php

use Illuminate\Database\Seeder;

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
