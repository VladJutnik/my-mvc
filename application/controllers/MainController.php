<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        echo 'Страница главная';
        var_dump($this->route);
    }

    public function contactAction()
    {
        echo 'Страница c контактами';
        var_dump($this->route);
    }
}