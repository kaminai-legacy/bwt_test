<?

//use \GuzzleHttp\Client;

class Model
{
    function __construct()
	{
		
		//$client = new Client();
		//use Guzzle\Http\EntityBody;
		//use Guzzle\Http\Message\Request;
		//use Guzzle\Http\Message\Response;
		$this->$mysqli = new mysqli(DB_URL, DB_LOGIN, DB_PASSWORD,DB_NAME) or die($this->$mysqli->connect_error);		
	//	$this->$client = new \GuzzleHttp\Client();
		//$this->$client = new Client(['headers' => ['X-Gismeteo-Token' => '56b30cb255.3443075']]);
	}

    public function db_select_array($query)
	{ 
		$mysqli_query = $this->$mysqli->query($query) or die($this->$mysqli->error);	
	
		$arr = array();
		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
			$arr[] = $row;
		}

		return $arr;
	}
	
	public function db_select_row($query)
	{
		$mysqli_query = $this->$mysqli->query($query) or die($this->$mysqli->error);

		$arr = array();
		while ($row = mysqli_fetch_array($mysqli_query, MYSQLI_ASSOC)) {
			$arr = $row;
		}

		return $arr;
	}	

	public function get_data()
	{
	}
}