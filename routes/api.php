<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeatherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/weather/now/{location?}', [WeatherController::class, 'show']);
Route::get('/weather/forecast/{lat}/{long}', [WeatherController::class, 'forecast']);
Route::get('/weather/findByLocation/{query}', [WeatherController::class, 'findByLocation']);
Route::get('/weather/findByCoords/{lat}/{long}', [WeatherController::class, 'findByCoords']);


