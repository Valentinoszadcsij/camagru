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
            $user = User::findByID($_SESSION['user_id']);
            $userName = $user['name'];
            require_once __DIR__ . "/../Views/userProfile.php";
            exit;
        }

            
        $_SESSION['error'] = "Login required to access this page!";
        header('Location: /Auth/login');
        exit;

    }
}