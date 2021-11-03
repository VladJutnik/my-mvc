<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        $db = new Db;
        $data = $db->row('SELECT name FROM user');
        debug($data);
        $vars = [
            'name' => 'ВАася',
            'age' => '33',
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function contactAction()
    {
        $this->view->render('Контакты');
    }
}