<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Excomposer\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "ModelController@homepage");

$router->get('/login/', "ModelController@showLogin");
$router->get('/register/', "ModelController@showRegister");

$router->post('/login/', "ModelController@login");
$router->post('/register/', "ModelController@store");

$router->run();
