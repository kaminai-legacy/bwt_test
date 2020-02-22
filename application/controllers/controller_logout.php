<?php

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
