<?php

namespace app;

use app\Database;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }
    public function resolve()
    {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl];
        } else {
            $fn = $this->postRoutes[$currentUrl];
        }
        if ($fn) {
            // $controller = new $fn[0];
            // call_user_func(array($controller, $fn[1]));
            call_user_func($fn, $this);
        } else {
            echo "Not Page Found";
        }
    }
    public function renderView($view, $params = []) {
        foreach($params as $key => $param) {
            $$key = $param;
        }
        ob_start();
        include_once __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/views/_layout.php";
    }
}
