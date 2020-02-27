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
		$controller_name = 'Controller_' . ucfirst($controller_name);
		$action_name = 'action_'.$action_name;
		
		
		
		$full_controller_class_name = "Application\\Controllers\\" . $controller_name;

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		
		// Проверяем есть ли такой контроллер
		if(file_exists($controller_path))
		{
			// создаем контроллер
			$controller = new $full_controller_class_name;
		}
		else
		{
			Route::ErrorPage404();
		}

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