<?php
//custom autoloader
spl_autoload_register(function ($class) {
    require "src/" . $class . ".php";
});


//custom functions
function debug($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}