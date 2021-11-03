<?php

namespace application\core;

class View
{
    public $path; //путь к нашему виду
    public $route; //url
    public $layout = 'defaut'; //шаблон. шаблон - это мета теги подгрузка стилий и тд, т.е. все что лежит в теге html до body  а все что в body это ВИД!

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }
    //загрузка наших представлений
    public function render($title, $vars = [])
    {
        //вставляем в переменную $content
        extract($vars);
        $path = 'application/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();//вкидываем в буфер наши данные которые хотим вставить в страницу!
            require $path;
            $content = ob_get_clean();//ob_get_clean - Получает содержимое текущего буфера и затем удаляет текущий буфер.
            require 'application/views/layouts/'.$this->layout.'.php';
        }
    }

    public function redirect($url){
        header('loction: '.$url);
        exit();
    }

    //вывод ошибок!
    public static function erroreCode($code) {
        http_response_code($code);
        $path = 'application/views/errore/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }
}
