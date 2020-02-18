<?
use GuzzleHttp\Client;

class Model_Weather extends Model
{
	
	function Text(){
		$q ="SELECT text FROM `about`";
		$r = $this->db_select_row($q);
		return $r;
	}

		/*
	
			$client = new Client([
			'base_uri' => 'http://httpbin.org',
			'timeout' => 2.0,
			]);
	*/


	function get_weather(){
		//$client = new Client(['base_uri' => 'http://www.gismeteo.ua']);

		$client = new Client([
			'base_uri' => 'www.gismeteo.ua',
			'timeout' => 5.0,
			]);
			$response = $client->request('GET', 'https://api.gismeteo.net/v2/weather/current/5093/', [
				'headers' => [
					'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36',
					'X-Gismeteo-Token' => "56b30cb255.3443075"
				]
			]);	

			//$response = $client->request('GET', 'city/daily/5093');
			/*
		$request = $client->get('http://www.gismeteo.ua/city/daily/5093/');
		$response = $request->send();*/
		//$body = $response->getBody(true);
		//$response = $client->request('GET', 'http://www.gismeteo.ua/city/daily/5093/');
		//$request = new Request('GET', 'http://www.gismeteo.ua/city/daily/5093/');
		//->get('http://httpbin.org/get');
		//$res = $this->$client->request('GET', 'http://www.gismeteo.ua/city/daily/5093/');
		//->get("http://httpbin.org/get");
		//->request("GET", "https://www.gismeteo.ua/weather-zaporizhia-5093/");
		// Получаем код ответа сервера (200 - успешно, 404 - страница не найдена)
		//$code = $res->getStatusCode();

		// Извлекаем содержимое удаленного ресурса
		//$text = $res->getBody();
		echo '<pre>';
		print_r(get_class_methods($response));
		echo '</pre>';
		echo '<pre>';
		print_r($response->getStatusCode());
		echo '</pre>';
		echo '<pre>';
		print_r($response->getBody());
		echo '</pre>';


		return $response->getBody();
	}



}
?>