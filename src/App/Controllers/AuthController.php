<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
use App\Models\User;

class AuthController
{
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . '/../Views/login.php';
            exit;
        }
        session_start();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /dashboard');
            exit;
        }

        $_SESSION['error'] = "Invalid email or password.";
        header('Location: /login');
    }



    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            include_once __DIR__ . ("/../Views/register.php");
            exit;
        }

        session_start();
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::findByEmail($email)) {
            $_SESSION['error'] = "Email already in use.";
            header('Location: /../Views/register');
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        User::create($name, $email, $hashedPassword);

        $_SESSION['success'] = "Registration successful. Please log in.";
        header('Location: /Auth/login');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}