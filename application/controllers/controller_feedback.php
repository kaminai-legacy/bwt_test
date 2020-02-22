<?
class Controller_Feedback extends Controller
{
	function __construct()
	{
		$this->model = new Model_Feedback();
		$this->view = new View();
	}	

	function action_list($page=1)
	{	
		$data = (object)[];
		$data->current_page = FEEDBACK_URL;
		$data->current_page = $page;
		if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
		{
			$number_of_pages = $this->model->getCount();

			$expected_fist_page_for_pagination = $data->current_page-floor(NUMBER_FEEDBACKS_FOR_PAGINATION/2);

			if($expected_fist_page_for_pagination<=0)
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
			}
			else
			{
				$data->last_page_for_pagination = $data->fist_page_for_pagination + $number_of_pages - 1;
			}

			$data->contain=$this->model->Pagin($page);
			//var_dump($data->contain);
		}
		

		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}
}