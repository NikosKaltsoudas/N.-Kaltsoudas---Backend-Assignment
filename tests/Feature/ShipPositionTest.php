<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShipPositionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ship_position_valid()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '-42.1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "15.4415000",
            "max_longtitude" => "16.2518200",
            "time_from" => "1372700220",
            "time_to"=> "1372700460",
            "mmsi" => "247039300"
        ]);

        $response->assertStatus(200);

    }

    public function test_ship_position_invalid_mmsi()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '-42.1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "15.4415000",
            "max_longtitude" => "16.2518200",
            "time_from" => "1372700220",
            "time_to"=> "1372700460",
            "mmsi" => "Text goes here"
        ]);

        $response->assertStatus(422);

    }

    public function test_ship_position_invalid_mmsi_array()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '-42.1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "15.4415000",
            "max_longtitude" => "16.2518200",
            "time_from" => "1372700220",
            "time_to"=> "1372700460",
            "mmsi" => [247039300, "Only the previous value is valid"]
        ]);

        $response->assertStatus(422);

    }

    public function test_ship_position_invalid_latitude()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "15.4415000",
            "max_longtitude" => "16.2518200",
            "time_from" => "1372700220",
            "time_to"=> "1372700460",
            "mmsi" => "247039300"
        ]);

        $response->assertStatus(422);

    }
    
    public function test_ship_position_invalid_longtitude()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '-42.1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "-180.000000001",
            "max_longtitude" => "16.2518200",
            "time_from" => "1372700220",
            "time_to"=> "1372700460",
            "mmsi" => "247039300"
        ]);

        $response->assertStatus(422);

    }

    public function test_ship_position_invalid_time()
    {
        $response = $this->post('/api/shipPosition',
        [
            'min_latitude' => '-42.1333500',
            "max_latitude" => "42.7517800",
            "min_longtitude" => "15.4415000",
            "max_longtitude" => "16.2518200",
            "time_from" => "31/02/2023",
            "time_to"=> "1372700460",
            "mmsi" => "247039300"
        ]);

        $response->assertStatus(422);

    }
}
