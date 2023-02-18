<?php
if (!defined('JOIN_CORE') || !JOIN_CORE) die();

use App\Main;


//custom autoloader
spl_autoload_register(function ($class) {
    require "src/" . $class . ".php";
});

//application startup
(new Main())->execute();


//custom functions
function debug($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}