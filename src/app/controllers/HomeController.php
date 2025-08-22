<?php
namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        $message = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $pass = $_POST['password'] ?? '';

            if (!empty($name) && !empty($email) && !empty($pass)) {
                $user = new User();
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $message = $user->registerNewUser($name, $email, $pass);
            }
            else {
                $message = "Please fill in all fields";
            }
        }
        include __DIR__ . "/../views/home.php";
    }
}