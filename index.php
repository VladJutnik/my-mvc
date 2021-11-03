<?php

require 'application/lib/Dev.php';
use \application\core\Router;
use \application\lib\Db;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');//заменяем слуши в пути! важно
    if (file_exists($path)) {
        require $path;
    }
});

session_start();

$arr = [1, 2, 3];

$new = new Router();
echo $new->run();
