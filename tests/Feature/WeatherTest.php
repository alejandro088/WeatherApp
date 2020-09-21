<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    
    public function test_it_should_get_weather_now()
    {
        $response = $this->getJson('/api/weather/now/468739');

        $response->dump();

        $response
            ->assertJsonStructure([
                "weather",
                "title",
                "timezone"
            ]);
    }

    public function test_it_should_get_weather_forecast()
    {
        $response = $this->getJson('/api/weather/forecast/468739');

        $response->dump();

        $response->assertJsonCount(5, null);
    }

    public function test_it_should_return_a_search_result()
    {
        $query = "Buenos Aires";

        //https://www.metaweather.com/api/location/search/?lattlong=-34.4442,-58.5775

        $response = $this->getJson("/api/weather/findByLocation/$query");

        $response->dump();

        $response
            ->assertJsonStructure([[
                "title",
                "location_type",
                "woeid",
                "latt_long"
            ]]);
    }
}
