<?php

namespace application\core;

//положение нашего класаа в нашей системе
class Router //
{
    protected $routes = [];
    protected $params = [];

    function __construct()
    {
        $arr = require 'application/config/routes.php'; //список маршрутов!
        //debug($arr);
        foreach ($arr as $key => $value):
            $this->add($key, $value);
        endforeach;
        //debug( $this->routes);
    }

    public function add($route, $params) //добавление маршрута
    {
        //echo '<p>' . $route . '</p>-' . $params . '<br><br>';
        $route_one = '#^' . $route . '$#';//добавлил в начало и конец строки симоволы для функций прэгматч
        $this->routes[$route_one] = $params;
    }

    public function math() //проверка маршрута
    {
        //проверячем есть в нашемм массиве routes прописанные пути для контроллера
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params):
            if (preg_match($route, $url, $mathes)) {
                $this->params = $params;
                return true;
            }
        endforeach;
        return false;
    }

    public function run() //запуск маршрута
    {
        //Сдесь подуключаем контроллеры а в нем уже потом будем вызывать методы
        if ($this->math()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'не найден ' . $action;
                }
            } else {
                echo 'не найден ' . $path;
            }
        } else {
            echo 'маршрут не найден';
        }
    }
}