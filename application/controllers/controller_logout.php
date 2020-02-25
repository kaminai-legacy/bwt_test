<?php
//namespace Controller_Logout;
use Controller\Controller as Controller;
use Model_User\Model_User as Model_User;
use View\View as View;
use Route\Route as Route;

class Controller_Logout extends Controller
{
	function __construct()
	{
		$this->user_model = new Model_User();
	}	

	function action_index()
	{
		$this->user_model->logout();
		Route::redirect(HOME_URL);
	}

}
