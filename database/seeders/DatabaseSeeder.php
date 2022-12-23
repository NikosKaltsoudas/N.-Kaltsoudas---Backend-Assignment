<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if (Storage::disk('local')->exists('ship_positions.json')) {  
            $ship_positions = json_decode(Storage::disk('local')->get('ship_positions.json'), true);
            foreach($ship_positions as $ship_position) {
                \App\Models\ShipPosition::create([
                    "mmsi" => $ship_position["mmsi"],
                    "status" => $ship_position["status"],
                    "stationId" => $ship_position["stationId"],
                    "speed" => $ship_position["speed"],
                    "lon" => $ship_position["lon"],
                    "lat" => $ship_position["lat"],
                    "course" => $ship_position["course"],
                    "heading" => $ship_position["heading"],
                    "rot" => $ship_position["rot"],
                    "timestamp" => $ship_position["timestamp"],
                ]);
            };
        }
    }
}
