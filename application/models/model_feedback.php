<?
class Model_Feedback extends Model
{
	function getCount(){
		$q ="SELECT COUNT('id') as `number` FROM `feedbacks`";
		$count = $this->db_select_row($q);
		$pages = ceil($count["number"]/ NUMBER_FEEDBACKS_FOR_PAGE);
		return $pages;
	}

	function Pagin($page){
		$startPoint = ($page-1) * NUMBER_FEEDBACKS_FOR_PAGE;
		$q ="SELECT * FROM `feedbacks` LIMIT $startPoint, " . constant("NUMBER_FEEDBACKS_FOR_PAGE");
		$r = $this->db_select_array($q);
		return $r;
	}
}
?>