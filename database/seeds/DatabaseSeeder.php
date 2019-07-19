<?php

use App\Client;
use App\Appointment;
use App\Treatment;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

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
        User::truncate();

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

        // $workingHours = [9, 10, 11, 12, 13, 14, 15, 16];
        $workingHours = config('constants.WORKING_HOURS');

        $treatments = Collection::make();
        foreach ($treatmentData as $data) {
            $treatments->push(Treatment::create([
                'type'      => $data['name'],
                'duration'  => $data['duration'],
                'price'     => $data['price'],
            ]));
        }

        factory(Client::class, 5)->create()->each(function ($client) use ($treatments, $workingHours) {
            for ($i = 1; $i <= 4; $i++) {
                $treatment = $treatments->random();
                $randomHour = Arr::random($workingHours);
                
                Appointment::create([
                    'user_id'              => $client->id,
                    'client_id'            => $client->id,
                    'treatment_id'         => $treatment->id,
                    'treatment_start_time' => Carbon::now()->setHour($randomHour)->addMonths($i)->toDateString().$randomHour.':00:00',
                ]);
            }
        });  
    }
}