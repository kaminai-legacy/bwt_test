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
		$data = (object)[];

		include $_SERVER["DOCUMENT_ROOT"] . '/application/validation_rules.php';
		
		if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
		{
			Route::redirect(HOME_URL);
		}

		if(( !(empty($_POST["registration-submit"])) ) && ( isset($_POST["registration-submit"]) ))
		{
			if 
			(
				( !( empty($_POST["name"]) ) ) && ( isset($_POST["name"]) ) &&
				( !( empty($_POST["forename"]) ) ) && ( isset($_POST["forename"]) ) &&
				( !( empty($_POST["email"]) ) ) && ( isset($_POST["email"]) ) &&
				( !( empty($_POST["password"]) ) ) && ( isset($_POST["password"]) ) &&
				( !( empty($_POST["confirm_password"]) ) ) && ( isset($_POST["confirm_password"]) )
			)
			{
				$email = $email = filter_var(
					$_POST["email"],
					FILTER_VALIDATE_EMAIL
				);
				$name = $_POST["name"];
				$forename = $_POST["forename"];
				$password = $_POST["password"];
				$confirm_password = $_POST["confirm_password"];

				$email_error = null;
				$name_error = null;
				$password_error = null;
				$forename_error = null;
				$confirm_password_error = null;

				if(!$email)
				{
					$email_error = "Неподходящий email";
				}

				$validation_rules->password->check_field($password);

				if($validation_rules->password->has_error())
				{
					$password_error = $validation_rules->password->error;
				}

				$validation_rules->forename->check_field($forename);

				if($validation_rules->forename->has_error())
				{
					$forename_error = $validation_rules->forename->error;
				}

				$validation_rules->name->check_field($name);

				if($validation_rules->name->has_error())
				{
					$name_error = $validation_rules->name->error;
				}

				if($password != $confirm_password)
				{
					$confirm_password_error = "Пароли не совпадают";
				}

				if($email_error || $name_error || $password_error || $forename_error || $confirm_password_error)
				{
					$data->error_message = "В полях допущены ошибки";
				}
				else
				{
					$this->user_model->registration($name, $forename, $email, $password, $_POST["gender"], $_POST["birthday"]);
					Route::redirect(HOME_URL);
				}
			}
			else
			{
				$data->error_message = "В полях допущены ошибки";
			}
		}
		
		$data->current_page = REGISTRATION_URL;
		$data->genders = $this->model->get_genders();

		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
}