<?
class Model
{

    function __construct()
	{
        $this->$mysqli = new mysqli(DB_URL, DB_LOGIN, DB_PASSWORD,DB_NAME) or die($this->$mysqli->connect_error);
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