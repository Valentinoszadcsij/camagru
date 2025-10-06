<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Utility/session_debug.php';
use App\Models\User;

class AuthController
{
    public function index()
    {
        session_start();
        if (User::is_logged_in())
        {
            header('Location: /UserProfile');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . '/../Views/auth.php';
            exit;
        }
        $email = $_POST['email'] ?? '';
        $user = User::findByEmail($email);
        $_SESSION['email'] = $email;
        if ($user)
        {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /Auth/login');
            exit;
        }
        $_SESSION['error'] = "no_user";
        header('Location: /Auth');
        exit;
    }

    public function login()
    {
        session_start();
        if (User::is_logged_in())
        {
            header('Location: /UserProfile');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . '/../Views/login.php';
            exit;
        }
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($_SESSION['email']);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            header('Location: /UserProfile');
            exit;
        }

        $_SESSION['error'] = "Invalid email or password.";
        header('Location: /Auth/login');
        exit;
    }



    public function register()
    {
        session_start();
        if (User::is_logged_in())
        {
            header('Location: /UserProfile');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            require_once __DIR__ . ("/../Views/register.php");
            exit;
        }

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
        $user = User::findByEmail($email);
        $_SESSION['user_id'] = $user['id'];
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