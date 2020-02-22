<?
class Model_User extends Model
{
	
	function authorization($email, $password){
		$q ="SELECT * FROM `users` WHERE (email='$email')";
		$res = $this->db_select_row($q);
		if($password == $res['password']){
			$_SESSION["user"] = $res;		
		}
	}

	function registration($name, $forename, $email, $password, $gender=null, $birthday=null){
		//INSERT INTO `users`(`id`, `name`, `forename`, `email`, `birthday`, `gender`, `password`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
		$q ="INSERT INTO `users`(`name`, `forename`, `email`, `password`, `gender`, `birthday`) VALUES 
		('$name', '$forename', '$email', '$password', $gender, '$birthday')";
		//echo $q;
		$this->db_query($q);
		$this->authorization($email, $password);
		//$r = $this->db_select_row($q);
	}

	function get_weather(){

		$response = $this->gismeteo_request('https://api.gismeteo.net/v2/weather/current/'.CITY_FOR_WEATHER_REQUEST);

		return $response;
	}
}
?>