<?
class Model_Feedback extends Model
{
	function getCount(){
		$q ="SELECT COUNT('id') as `number` 
		FROM `feedbacks`";
		$count = $this->db_select_row($q);
		$pages = ceil($count["number"]/ NUMBER_FEEDBACKS_FOR_PAGE);
		return $pages;
	}

	function pagin($page){
		$startPoint = ($page-1) * NUMBER_FEEDBACKS_FOR_PAGE;
		$q ="SELECT `feedbacks`.*,  `customer_feedbacks`.user_id
		FROM `feedbacks` INNER JOIN `customer_feedbacks` ON (`customer_feedbacks`.feedback_id= `feedbacks`.id)
		LIMIT $startPoint, " . constant("NUMBER_FEEDBACKS_FOR_PAGE");
		$r = $this->db_select_array($q);
		return $r;
	}


/*

BEGIN;
INSERT INTO users (username, password)
  VALUES('test', 'test');
INSERT INTO profiles (userid, bio, homepage) 
  VALUES(LAST_INSERT_ID(),'Hello world!', 'http://www.stackoverflow.com');
COMMIT;
SELECT LAST_INSERT_ID();


SET @lastID := LAST_INSERT_ID();

@lastID

BEGIN;

*/

	function send_feedback($name, $email, $feedback){
		//INSERT INTO `feedbacks`(`id`, `name`, `email`, `text`) VALUES ([value-1],[value-2],[value-3],[value-4])
		$q ="BEGIN;";
		$this->db_query($q);
		$q ="INSERT INTO `feedbacks` (`name`, `email`, `text`)VALUES ('$name', '$email', '$feedback');";
		$this->db_query($q);
		$user_id=$_SESSION["user"]["id"];
		$q ="INSERT INTO `customer_feedbacks`(`user_id`, `feedback_id`) VALUES ($user_id,LAST_INSERT_ID())";
		$this->db_query($q);
		$q ="COMMIT;";
		$this->db_query($q);
		//$this->db_query($q);
	}
	

}
?>