<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->redirect('/main/index');
    }

    public function registerAction()
    {
        $this->view->render('Регистрация');
    }
}