<?php
namespace core;
class Router
{
    public $routes = [];
    public $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_URI'];
        echo $this->request . PHP_EOL;
    }
}