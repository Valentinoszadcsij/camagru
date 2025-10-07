<?php
namespace App\Controllers;
use App\Models\User;

class HomeController
{
    public function index()
    {
        session_start();
        include __DIR__ . "/../Views/home.php";
    }
}