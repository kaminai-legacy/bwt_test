<?
namespace Application\Controllers;
use Application\Core\Controller;

class Controller_Home extends Controller
{
	function action_index()
	{	
		$data = (object)[];
		$data->current_page = HOME_URL;
		$this->view->generate('home_view.php', 'template_view.php', $data);
	}
}