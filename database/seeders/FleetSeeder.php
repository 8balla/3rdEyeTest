<?php

namespace Database\Seeders;
use Database\Factories\FleetFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Armament;
use App\Models\Starfleet;
use App\Models\Fleet;

class FleetSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */



    public function run()
    {
        $armament = Armament::paginate(5);
        $starfleet = Starfleet::paginate(5);

        foreach ($starfleet as $starfleet) {
            foreach ($armament as $armament) {
                Fleet::firstOrCreate([
                    'starfleet' => $starfleet->id,
                    'armament_id' => $armament->id,
                ]);
            }
        }
    }
}