<?php

session_start();
if(!isset($_SESSION['Auth'])){
  $_SESSION['Auth'] = '';
}
define('BASE_URL', 'https://spyagency.go.yj.fr/');

require_once '../vendor/autoload.php';
require_once '../app/router/Router.php';
require_once '../app/controllers/HomeController.php';
require_once '../app/controllers/MissionPageController.php';
require_once '../app/controllers/LoginPageController.php';
require_once '../app/controllers/AdminPageController.php';
require_once '../app/controllers/LogoutController.php';
require_once '../app/controllers/CreatePageController.php';
require_once '../app/controllers/DeleteController.php';
require_once '../app/controllers/UpdatePageController.php';

$router = new Router();

$router->addRoute('GET', BASE_URL.'/', 'HomeController', 'index');
$router->addRoute('GET', BASE_URL.'/mission', 'MissionPageController', 'index');
$router->addRoute('GET', BASE_URL.'/login', 'LoginPageController', 'index');
$router->addRoute('POST', BASE_URL.'/login', 'LoginPageController', 'index');
$router->addRoute('GET', BASE_URL.'/adminpage', 'AdminPageController', 'index');
$router->addRoute('GET', BASE_URL.'/logout', 'LogoutController', 'index');
$router->addRoute('GET', BASE_URL.'/create', 'CreatePageController', 'index');
$router->addRoute('POST', BASE_URL.'/create', 'CreatePageController', 'index');
$router->addRoute('GET', BASE_URL.'/update', 'UpdatePageController', 'index');
$router->addRoute('POST', BASE_URL.'/update', 'UpdatePageController', 'index');
$router->addRoute('GET', BASE_URL.'/delete', 'DeleteController', 'index');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$handler = $router->getHandler($method, $uri);

if ($handler === null ) { 
  header ('HTTP/1.1 404 not found');
  exit();
}

$controller = new $handler['controller']();
$action = $handler['action'];
$controller->$action();

