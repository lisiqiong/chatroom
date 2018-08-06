<?php

//自动加载
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $file_name  = $class_name . '.class.php';
    if (file_exists($file_name)) {
        require_once $file_name;
    }
});

use Libs\Common\Config;
//use Libs\Server\Server;
include("./Libs/Server/Server.class.php");
$c = new Config();
$config = $c->getAll();
new Server($config);
