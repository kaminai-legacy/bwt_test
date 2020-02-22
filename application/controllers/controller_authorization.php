<?
class Controller_Authorization extends Controller
{
	function __construct()
	{
		$this->model = new Model_Authorization();
		$this->user_model = new Model_User();
		$this->view = new View();
	}	

	function action_index()
	{	
		if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
		{
			Route::redirect(HOME_URL);
		}
		
		if(( !( empty($_POST["authorization-submit"]) ) ) && ( isset($_POST["authorization-submit"]) ))
		{
			
			if 
			(
				( !( empty($_POST["email"]) ) ) && ( isset($_POST["email"]) ) &&
				( !( empty($_POST["password"]) ) ) && ( isset($_POST["password"]) )
			)
			{
				$this->user_model->authorization($_POST["email"], $_POST["password"]);
				Route::redirect(HOME_URL);
			}
		}

		$data = (object)[];
		$data->current_page = AUTHORIZATION_URL;
		$this->view->generate('authorization_view.php', 'template_view.php', $data);
	}
}