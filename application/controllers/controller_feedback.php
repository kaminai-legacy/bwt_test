<?
class Controller_Feedback extends Controller
{
	function action_index()
	{	
		$data = (object)[];
		$data->current_page = FEEDBACK_URL;
		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}
}