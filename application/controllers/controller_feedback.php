<?
namespace Application\Controllers;
use Application\Core\Controller;
use Application\Core\View;
use Application\Models\Model_Feedback;

class Controller_Feedback extends Controller
{
	function __construct()
	{
		$this->model = new Model_Feedback();
		$this->view = new View();
	}	

	function action_index()
	{
		$data = (object)[];
		$data->current_page = FEEDBACK_URL;

		include $_SERVER["DOCUMENT_ROOT"] . '/application/validation_rules.php';

		if(( !(empty($_POST["feedback-submit"])) ) && ( isset($_POST["feedback-submit"]) ))
		{
			if 
			(
				( !( empty($_POST["name"]) ) ) && ( isset($_POST["name"]) ) &&
				( !( empty($_POST["email"]) ) ) && ( isset($_POST["email"]) ) &&
				( !( empty($_POST["contain"]) ) ) && ( isset($_POST["contain"]) ) &&
				( !( empty($_POST["captcha"]) ) ) && ( isset($_POST["captcha"]) )
			)
			{
				$email = $email = filter_var(
					$_POST["email"],
					FILTER_VALIDATE_EMAIL
				);
				$name = $_POST["name"];
				$contain = $_POST["contain"];
				$captcha = $_POST["captcha"];

				$email_error = null;
				$name_error = null;

				if(!$email)
				{
					$email_error = "Неподходящий email";
				}
		
				$validation_rules->name->check_field($name);

				if($validation_rules->name->has_error())
				{
					$name_error = $validation_rules->name->error;
				}

				if($email_error || $name_error)
				{
					$data->error_message = "В полях допущены ошибки";
				}
				else
				{
					if($captcha != $_SESSION['rand_code'])
					{
						$data->error_message = "Капча введена неправильно";
					}
					else
					{
						$this->model->send_feedback($name, $email, $contain);
						Route::redirect(FEEDBACK_LIST_URL);
					}
				}
			}
			else
			{
				$data->error_message = "В полях допущены ошибки";
			}
		}

		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}

	function action_list($page=1)
	{	
		$data = (object)[];
		
		include $_SERVER["DOCUMENT_ROOT"] . '/application/validation_rules.php';
		
		$data->current_page = FEEDBACK_LIST_URL;
		$data->current_page = $page;

		if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
		{
			$number_of_pages = $this->model->getCount();

			$expected_fist_page_for_pagination = $data->current_page-floor(NUMBER_FEEDBACKS_FOR_PAGINATION / 2);

			if($expected_fist_page_for_pagination <= 0)
			{
				$data->fist_page_for_pagination = 1;
			}
			else
			{
				$data->fist_page_for_pagination = $expected_fist_page_for_pagination;
			}

			if($number_of_pages >= NUMBER_FEEDBACKS_FOR_PAGINATION)
			{
				$data->last_page_for_pagination = $data->fist_page_for_pagination + NUMBER_FEEDBACKS_FOR_PAGINATION - 1;
				while($data->last_page_for_pagination > $number_of_pages)
				{
					$data->last_page_for_pagination--;
					$data->fist_page_for_pagination--;
				}
			}
			else
			{
				$data->last_page_for_pagination = $data->fist_page_for_pagination + $number_of_pages - 1;
			}

			$data->contain=$this->model->pagin($page);
			
		}

		$this->view->generate('feedback_list_view.php', 'template_view.php', $data);
	}
}