<?
class Controller_Registration extends Controller
{

	function __construct()
	{
		$this->model = new Model_Registration();
		$this->user_model = new Model_User();
		$this->view = new View();
	}	

	function action_index()
	{	
		if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
		{
			Route::redirect(HOME_URL);
		}

		if(( !( empty($_POST["registration-submit"]) ) ) && ( isset($_POST["registration-submit"]) ))
		{
			if 
			(
				( !( empty($_POST["name"]) ) ) && ( isset($_POST["name"]) ) &&
				( !( empty($_POST["forename"]) ) ) && ( isset($_POST["forename"]) ) &&
				( !( empty($_POST["email"]) ) ) && ( isset($_POST["email"]) ) &&
				( !( empty($_POST["password"]) ) ) && ( isset($_POST["password"]) )
			)
			{
				$this->user_model->registration($_POST["name"], $_POST["forename"], $_POST["email"], $_POST["password"], $_POST["gender"], $_POST["birthday"]);
				Route::redirect(HOME_URL);
			}
		}
	

		$data = (object)[];
		$data->current_page = REGISTRATION_URL;
		$data->genders = $this->model->get_genders();
		/*echo '<pre>';
		print_r($data->genders);
		echo '</pre>';*/

		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
}