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
		$q ="INSERT INTO `users`(`name`, `forename`, `email`, `password`, `gender`, `birthday`) VALUES 
		('$name', '$forename', '$email', '$password', $gender, '$birthday')";
		$this->db_query($q);
		$this->authorization($email, $password);
	}

	function logout(){
		unset($_SESSION["user"]);
	}

}
?>