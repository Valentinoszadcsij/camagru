<?php
namespace App\Controllers;
require_once __DIR__ . '/../Utility/session_debug.php';
use App\Models\User;

class HomeController
{
    public function index()
    {
        // $message = "";

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $name = $_POST['name'] ?? '';
        //     $email = $_POST['email'] ?? '';
        //     $pass = $_POST['password'] ?? '';

        //     if (!empty($name) && !empty($email) && !empty($pass)) {
        //         $user = new User();
        //         $pass = password_hash($pass, PASSWORD_DEFAULT);
        //         $message = $user->registerNewUser($name, $email, $pass);
        //     }
        //     else {
        //         $message = "Please fill in all fields";
        //     }
        // }
        session_start();
        include __DIR__ . "/../Views/home.php";
    }
}