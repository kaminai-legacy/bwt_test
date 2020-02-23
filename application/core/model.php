<?

use GuzzleHttp\Client;

class Model
{
    function __construct()
	{
		$this->mysqli = new mysqli(DB_URL, DB_LOGIN, DB_PASSWORD,DB_NAME) or die($this->mysqli->connect_error);		
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

	// выборка с результатом в виде списка строк
    public function db_select_array($query)
	{ 
		$mysqli_query = $this->mysqli->query($query) or die($this->mysqli->error);	
	
		$arr = array();
		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
			$arr[] = $row;
		}

		return $arr;
	}
	
	// выборка с результатом в виде строки
	public function db_select_row($query)
	{
		$mysqli_query = $this->mysqli->query($query) or die($this->mysqli->error);

		$arr = array();
		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
			$arr = $row;
		}

		return $arr;
	}	

	// Запрос к БД
	public function db_query($query)
	{
		$mysqli_query = $this->mysqli->query($query) or die($this->mysqli->error);
	}

	// Получения списка полов для формы регистрации
	public function get_genders(){
		$q ="SELECT * FROM `genders`";
		$r = $this->db_select_array($q);
		return $r;
	}
}