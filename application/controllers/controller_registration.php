<?
class Controller_Registration extends Controller
{
	function action_index()
	{	
		$data = (object)[];
		$data->current_page = REGISTRATION_URL;
		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
}