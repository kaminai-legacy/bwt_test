<?
namespace Model;

use GuzzleHttp\Client;
use My_Pdo\My_Pdo as My_Pdo;

class Model extends My_Pdo
{
    function __construct()
	{
		$this->Guzzle_client = new Client();
	}

	// Запрос на gismeteo api 
	public function gismeteo_request($query_url,$params=[])
	{ 
		$res = $this->Guzzle_client->request('GET', 'https://api.gismeteo.net/v2/weather/current/' . CITY_FOR_WEATHER_REQUEST, [
			'headers' => [
				'X-Gismeteo-Token' => '5c10e9ce8e02f6.83138424',
				'Accept-Encoding' => 'gzip',
			],
			'query' => $params,
			'decode_content' => 'gzip',
		]);

		return json_decode($res->getBody()->getContents(),true);
	}

	// Получения списка полов для формы регистрации
	public function get_genders(){
		$query ="SELECT * FROM `genders`";
		$result = parent::db_select_array($query, "genders");
		return $result;
	}
}