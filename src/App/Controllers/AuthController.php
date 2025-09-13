<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
use App\Models\User;

class AuthController
{
    public function login()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . '/../Views/login.php';
            exit;
        }
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /UserProfile');
            exit;
        }

        $_SESSION['error'] = "Invalid email or password.";
        header('Location: /Auth/login');
        exit;
    }



    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . ("/../Views/register.php");
            exit;
        }

        session_start();
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::findByEmail($email)) {
            $_SESSION['error'] = "Email already in use.";
            header('Location: /Auth/register');
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        User::create($name, $email, $hashedPassword);

        $_SESSION['success'] = "Registration successful. Please log in.";
        header('Location: /Auth/login');
    }

    public function logout()
    {
        
        // Expire the session cookie on the client
        if (ini_get("session.use_cookies")) {
            session_start();
    
            // Clear session variables
            $_SESSION = [];
    
            // Destroy session on the server
            session_destroy();
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000, // Expire in the past
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Redirect after logout
        header('Location: /');
        exit;
    }
}