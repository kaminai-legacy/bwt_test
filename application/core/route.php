<?php
namespace Application\Core;

class Route
{
    public static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Home';
        $action_name = 'index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }
        
        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $action_name = 'action' . ucfirst($action_name);

        $full_controller_class_name = "Application\\Controllers\\" . $controller_name;
        
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        
        // Проверяем есть ли такой контроллер
        if (file_exists($controller_path)) {
            // создаем контроллер
            $controller = new $full_controller_class_name;
        } else {
            Route::displayErrorPage();
        }

        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action($routes[3]);
        } else {
            Route::displayErrorPage();
        }
    }
    
    public static function displayErrorPage()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        Route::redirect('/NotFound');
    }
    
    public static function redirect($url)
    {   
        if ($url == HOME_URL) {
            header('Location: ' . URL);
        } else {
            header('Location: ' . URL . $url);
        }
    }
}
