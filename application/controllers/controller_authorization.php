<?
namespace Application\Controllers;
use Application\Core\Controller;
use Application\Core\View;
use Application\Core\Route;
use Application\Models\Model_User;
use Application\Models\Model_Authorization;
use Application\Validator\Validator;

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
				$email = $_POST["email"];

				$fields_for_validator = [
					[
						"password",
						$password,
						"password",
						6,
						40,
						(object)[
							"value"=>'/([a-z0-9]){6,}/i',
							"error_message"=>"Пароль должены быть из цифр или латинских букв",
						]
					],
					[
						"email",
						$email,
						"email"
					]
				];

				$validator = new Validator($fields_for_validator);
				$reslt_of_validation = $validator->checkFieldsHasError();		

				if($reslt_of_validation)
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