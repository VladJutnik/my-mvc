<?php

namespace application\core;

abstract class View
{
    public $path; //путь к нашему виду
    public $layout = 'defaut'; //шаблон. шаблон - это мета теги подгрузка стилий и тд, т.е. все что лежит в теге html до body  а все что в body это ВИД!

    public function __construct($route)
    {
        $this->route = $route;
    }
}