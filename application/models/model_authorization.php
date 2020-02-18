<?
class Model_Authorization extends Model
{
	function Text(){
	$q ="SELECT text FROM `about`";
	$r = $this->db_select_row($q);
		return $r;
	}
}
?>