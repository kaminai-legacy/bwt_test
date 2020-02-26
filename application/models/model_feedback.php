<?
namespace Application\Models;
use Application\Core\Model;

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
		FROM `feedbacks` INNER JOIN `customer_feedbacks` ON (`customer_feedbacks`.feedback_id = `feedbacks`.id)
		LIMIT $startPoint, " . constant("NUMBER_FEEDBACKS_FOR_PAGE");
		$r = $this->db_select_array($q);
		return $r;
	}

	function send_feedback($name, $email, $feedback){
		$user_id=$_SESSION["user"]["id"];
		$q ="INSERT INTO `feedbacks` (`name`, `email`, `text`)VALUES ('$name', '$email', '$feedback');
		INSERT INTO `customer_feedbacks`(`user_id`, `feedback_id`) VALUES ($user_id,LAST_INSERT_ID())";
		$this->db_query($q);
	}
}
?>