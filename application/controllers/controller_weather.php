<?
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
		/*echo '<pre>';
		print_r($this->$data->weather);
		echo '</pre>';*/
		$this->view->generate('weather_view.php', 'template_view.php', $this->$data);
	}
}