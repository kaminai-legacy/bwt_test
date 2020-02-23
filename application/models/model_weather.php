<?
class Model_Weather extends Model
{

	function Text(){
		$q ="SELECT text FROM `about`";
		$r = $this->db_select_row($q);
		return $r;
	}

	function get_weather(){

		$response = $this->gismeteo_request('https://api.gismeteo.net/v2/weather/current/'.CITY_FOR_WEATHER_REQUEST);

		return $response;
	}
	
}
?>