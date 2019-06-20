<?php

use App\Client;
use App\Appointment;
use App\Treatment;
use Carbon\Carbon;

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
        $treatments = factory(Treatment::class, 10)->create();

        factory(Client::class, 10)->create()->each(function ($client) use ($treatments) {
            for ($i = 1; $i <= 4; $i++) {
                $treatment = $treatments->random();

                Appointment::create([
                    'client_id' => $client->id,
                    'treatment_id' => $treatment->id,
                    'treatment_start_time' => Carbon::now()->addMonths($i)->toDateTimeString(),
                ]);
            }
        });  
    }
}
