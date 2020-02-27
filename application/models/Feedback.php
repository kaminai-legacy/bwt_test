<?php
namespace Application\Models;

use Application\Core\Model;

class Feedback extends Model
{
    public function getCount()
    {
        $q ="SELECT COUNT('id') as `number` 
        FROM `feedbacks`";
        $count = $this->dbSelectRow($q);
        $pages = ceil($count["number"]/ NUMBER_FEEDBACKS_FOR_PAGE);
        return $pages;
    }

    public function pagin($page)
    {
        $startPoint = ($page-1) * NUMBER_FEEDBACKS_FOR_PAGE;
        $q ="SELECT `feedbacks`.*,  `customer_feedbacks`.user_id
		FROM `feedbacks` INNER JOIN `customer_feedbacks` ON (`customer_feedbacks`.feedback_id = `feedbacks`.id)
		LIMIT $startPoint, " . constant("NUMBER_FEEDBACKS_FOR_PAGE");
        $r = $this->dbSelectArray($q);
        return $r;
    }

    public function sendFeedback($name, $email, $feedback)
    {
        $user_id=$_SESSION["user"]["id"];
        $q ="INSERT INTO `feedbacks` (`name`, `email`, `text`) 
        VALUES ('$name', '$email', '$feedback');
		INSERT INTO `customer_feedbacks`(`user_id`, `feedback_id`) 
        VALUES ($user_id,LAST_INSERT_ID())";
        $this->dbQuery($q);
    }
}
