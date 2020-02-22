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
		$q ="SELECT `feedbacks`.*,  `customer feedbacks`.user_id
		FROM `feedbacks` INNER JOIN `customer feedbacks` ON (`customer feedbacks`.feedback_id= `feedbacks`.id)
		LIMIT $startPoint, " . constant("NUMBER_FEEDBACKS_FOR_PAGE");
		$r = $this->db_select_array($q);
		return $r;
	}

	function send_feedback($name, $email, $feedback){
		//INSERT INTO `feedbacks`(`id`, `name`, `email`, `text`) VALUES ([value-1],[value-2],[value-3],[value-4])
		$q ="INSERT INTO `feedbacks` (`name`, `email`, `text`) 
		VALUES ('$name', '$email', '$feedback')";
		//echo $q;
		$this->db_query($q);
	}
	

}
?>