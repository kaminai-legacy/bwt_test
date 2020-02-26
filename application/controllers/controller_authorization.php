<?
namespace Application\Controllers;
use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\Model_User;
use Application\Models\Model_Authorization;

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
		$data = (object)[];

		include $_SERVER["DOCUMENT_ROOT"] . '/application/validation_rules.php';

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
				$password = $_POST["password"];
				$email = filter_var(
					$_POST["email"],
					FILTER_VALIDATE_EMAIL
				);

				$email_error = null;
				$password_error = null;

				if(!$email)
				{
					$email_error = "Неподходящий email";
				}
		
				$validation_rules->password->check_field($password);

				if($validation_rules->password->has_error())
				{
					$password_error = $validation_rules->password->error;
				}

				if($email_error || $password_error)
				{
					$data->error_message = "В полях допущены ошибки";
				}
				else
				{
					$this->user_model->authorization($email, $password);
					Route::redirect(HOME_URL);
				}
			}
			else
			{
				$data->error_message = "В полях допущены ошибки";
			}
		}

		$data->current_page = AUTHORIZATION_URL;
		$this->view->generate('authorization_view.php', 'template_view.php', $data);
	}
}