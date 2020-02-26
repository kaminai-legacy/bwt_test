<?php
namespace Application\Core;
use Application\Controllers\Controller_404;

/*
use Application\Controllers\Controller_Home;
use Application\Controllers\Controller_404;
use Application\Controllers\Controller_Authorization;
use Application\Controllers\Controller_Feedback;
use Application\Controllers\Controller_Logout;
use Application\Controllers\Controller_Registration;
use Application\Controllers\Controller_Weather;*/

class Route
{
	static function start()
	{
		// подцепляем файл с классом модели пользователя
		//include $_SERVER["DOCUMENT_ROOT"] . '/application/models/model_user.php';
		// контроллер и действие по умолчанию
		$controller_name = 'Home';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_' . ucfirst($controller_name);
		$controller_name = 'Controller_' . ucfirst($controller_name);
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			//include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
	
		if(file_exists($controller_path))
		{
			//include "application/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$full_controller_class_name = "Application\\Controllers\\" . $controller_name;
		$controller = new $full_controller_class_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action($routes[3]);
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		Route::redirect('/404');
		//header('Location:'. URL .'/404');
	}
	
	static function redirect($url)
	{
		if($url == HOME_URL)
		{
			header('Location: ' . URL);
		}
		else
		{
			header('Location: ' . URL . $url);
		}
	}	

}