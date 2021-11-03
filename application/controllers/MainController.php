<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $vars = [
            'name' => 'ВАася',
            'age' => '33',
        ];
        $this->view->render('Главная страница',$vars);
    }

    public function contactAction()
    {
        $this->view->render('Контакты');
    }
}