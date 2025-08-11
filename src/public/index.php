<?php
// src/public/index.php
// This is the front controller. All requests are routed here.

// Instantiate the home controller and call a method
$homeController = new App\Controllers\HomeController();
$homeController->index();
