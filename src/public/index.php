<?php
// src/public/index.php
// This is the front controller. All requests are routed here.
require_once __DIR__ . '/../core/Autoload.php';
require_once __DIR__ . '/../core/Router.php';
// require_once __DIR__ . '/../App/controllers/HomeController.php';

use App\Controllers\HomeController;
use core\Router;
// Instantiate the home controller and call a method
$homeController = new HomeController();
$homeController->index();

$router = new Router;