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
            $controllers = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controllers.php';
            if (class_exists($controllers)) {
                echo 'jr';
            } else {
                echo 'не найден ' . $controllers;
            }
        } else {
            echo 'маршрут не найден';
        }
    }
}