<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
    public function showAction()
    {
        echo 'Страница новостей';
        var_dump($this->route);
    }
}