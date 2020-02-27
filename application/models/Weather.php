<?php
namespace Application\Models;

use Application\Core\Model;

class Weather extends Model
{
    public function getWeather()
    {
        $response = $this->gismeteoRequest('https://api.gismeteo.net/v2/weather/current/'.CITY_FOR_WEATHER_REQUEST);

        return $response;
    }
}
