<?
class Controller_Authorization_view extends Controller
{
	function action_index()
	{	
		$data = (object)[];
		$data->current_page = AUTHORIZATION_URL;
		$this->view->generate('authorization_view.php', 'template_view.php', $data);
	}
}