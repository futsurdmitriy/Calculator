<?php
class Route
{
    static function start()
    {
        $session  = Session::getInstance();
        $userData = new Login;
       
        // контроллер и действие по умолчанию
        $controller_name = 'Home';
        $action_name     = 'index';

        if (isset($_POST['logout'])) {
           $session->set('UserLogged',false,'Users');
           header('Location:/'.$controller_name);
        }

        //$userData->userDataCheck($_POST);
        $userData->sqlsmth($_POST);
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = ucfirst( $routes[1] );
        }
        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // добавляем префиксы
        $controller_name = 'Controller'.$controller_name;
        $action_name     = 'action'.$action_name;

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = "application/controllers/".$controller_file;

        if (file_exists($controller_path)) {
            include "application/controllers/".$controller_file;
        } else {
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action     = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}

