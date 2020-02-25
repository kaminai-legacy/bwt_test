<?php
//namespace Controller_404;
use Controller\Controller as Controller;
use View\View as View;

class Controller_404 extends Controller
{
	
	function action_index()
	{
		$this->view->generate('404_view.php', 'template_view.php');
	}

}
