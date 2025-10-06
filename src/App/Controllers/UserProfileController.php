<?php
namespace App\Controllers;
require_once __DIR__ . '/../Utility/session_debug.php';

use App\Models\User;
class UserProfileController
{
    // shows your own profile page
    public function index()
    {
        session_start();
        if(User::is_logged_in())
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

    // shows any user's page
    public function user($userId)
    {
        session_start();
        if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
        {
            $user = User::findByID($userId);
            $userName = $user['name'];
            require_once __DIR__ . "/../Views/userProfile.php";
            exit;
        }
        
        $_SESSION['error'] = "Login required to access this page!";
        header('Location: /Auth/login');
        exit;
    }
}