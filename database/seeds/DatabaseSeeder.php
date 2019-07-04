<?php

use App\Client;
use App\Appointment;
use App\Treatment;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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
        // $treatments = factory(Treatment::class, 10)->create();

        Appointment::truncate();
        Client::truncate();
        Treatment::truncate();

        $treatmentData = [
            [
                'name'     => 'Full Body Massage',
                'duration' => 60,
                'price'    => 35,
            ], [
                'name'     => 'Back, Neck, Shoulder Massage',
                'duration' => 30,
                'price'    => 25,
            ], [
                'name'     => 'Foot Massage', 
                'duration' => 30,
                'price'    => 25,
            ], [
                'name'     => 'Indian Head Massage',
                'duration' => 30,
                'price'    => 25,
            ],
        ];

        $treatments = Collection::make();
        foreach ($treatmentData as $data) {
            $treatments->push(Treatment::create([
                'type'      => $data['name'],
                'duration'  => $data['duration'],
                'price'     => $data['price'],
            ]));
        }

        factory(Client::class, 10)->create()->each(function ($client) use ($treatments) {
            for ($i = 1; $i <= 4; $i++) {
                $treatment = $treatments->random();

                Appointment::create([
                    'client_id'            => $client->id,
                    'treatment_id'         => $treatment->id,
                    'treatment_start_time' => Carbon::now()->addMonths($i)->toDateTimeString(),
                ]);
            }
        });  
    }
}
