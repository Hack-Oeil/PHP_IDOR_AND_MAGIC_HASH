<?php
require_once '../vendor/autoload.php';

session_set_cookie_params(3600,$_SERVER['HTTP_X_FORWARDED_PREFIX_PROXY']??'/');
session_start();



$kernel = new Yoop\Kernel();

(new Yoop\Database\Wait)->tryMySQL();

$router = $kernel->getRouter();
$router->load('/app/routes.php');
$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);