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

    public function forecast($location)
    {
    	$response = Http::get("https://www.metaweather.com/api/location/$location");
		$data = $response->json();
		
		$forecast = array_slice($data['consolidated_weather'], 1);
		return $forecast;
    }

    public function findByLocation($query)
    {
    	$response = Http::get("https://www.metaweather.com/api/location/search/?query=$query");
		$data = $response->json();

		return $data;
    }

    public function findByCoords($lat, $long)
    {
    	$response = Http::get("https://www.metaweather.com/api/location/search/?lattlong=$lat,$long");
		$data = $response->json();

		return $data;
    }
}
