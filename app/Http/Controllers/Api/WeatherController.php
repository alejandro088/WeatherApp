<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{

    public function show($location)
    {
    	$response = Http::get("https://www.metaweather.com/api/location/$location");
		$data = $response->json();

		$weather = [ 
			'weather' => $data['consolidated_weather'][0],
			'title' => $data['title'],
			'timezone' => $data['timezone']

		];
		
		return $weather;
    }

    public function forecast($lat, $long)
    {

    	$key = env('WEATHER_API_KEY');

    	// lat -34.4715
    	// long -58.545

    	$response = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$long&appid=$key&units=metric");
		$data = $response->json();
		
		return $data;
    }

    public function findByLocation($query)
    {

    	$response = Http::get("https://nominatim.openstreetmap.org/search?city=$query&format=json");
		$data = $response->json();

		return $data;
    }

    public function findByCoords($lat, $long)
    {
    	$key = env('WEATHER_API_KEY');

    	$response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$long&appid=$key");


		$data = $response->json();

		return $data;
    }
}
