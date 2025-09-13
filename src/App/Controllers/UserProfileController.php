<?php
namespace App\Controllers;

use App\Models\User;

class UserProfileController
{
    public function index()
    {
        session_start();
        if((isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
        {
            echo "Success";
            require_once __DIR__ . "/../Views/userProfile.php";
            exit;
        }

            
        $_SESSION['error'] = "Login required to access this page!";
        header('Location: /Auth/login');
        exit;

    }
}