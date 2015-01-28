<?php
/**
 * User: Nova
 * Date: 28.01.2015
 */
class Route
{
    static function start()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);

        if (count($uri) <= 2) {
            $controller_name = 'Main';

            if (!empty($uri[1])) {
                $controller_name = ucfirst($uri[1]);
                if($controller_name == '404')
                    $controller_name = 'PageNotFound';
            }

            $controller_name .= 'Controller';
            $controller_path = 'application/controllers/'.$controller_name.'.php';

            if (file_exists($controller_path)) {
                include $controller_path;
            } else {
                Route::ErrorPage404();
            }

            $controller = new $controller_name;
            $controller->show();
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
    }
}