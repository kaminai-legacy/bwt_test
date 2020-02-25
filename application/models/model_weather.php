<?
class Model_Weather extends Model
{
	function get_weather(){

		$response = $this->gismeteo_request('https://api.gismeteo.net/v2/weather/current/'.CITY_FOR_WEATHER_REQUEST);

		return $response;
	}
}
?>