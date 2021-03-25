<?php
    // Load Class
    define('__ROOT__', dirname(dirname(__FILE__)));
    spl_autoload_register(function($class){
        require_once (__ROOT__.'../classes/'.$class.'.php');
    });

    // Load URL
    $url = 'http://localhost/Premium/Garis%20Grafis/';

    // Start Session
    session_start();

    // Call DB
    $_db = Database::getInstance();
?>