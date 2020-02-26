<?
namespace Application\Controllers;
use Application\Core\Controller;
use Application\Core\View;
use Application\Models\Model_Weather;

class Controller_Weather extends Controller
{

	function __construct()
	{
		$this->model = new Model_Weather();
		$this->view = new View();
	}	

	function action_index()
	{	
		$this->$data = (object)[];
		$this->$data->current_page = WEATHER_URL;
		$this->$data->weather = $this->model->get_weather()["response"];
		$this->view->generate('weather_view.php', 'template_view.php', $this->$data);
	}
}