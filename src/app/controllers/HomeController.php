<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        // 1. Model: Get data from the model
        $user = new User();
        $message = $user->getWelcomeMessage();

        // 2. View: Pass the data to the view
        include __DIR__ . '/../views/home.html';
    }
}