<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/User.php';
use App\Models\User;
use App\Utility\Auth;
use App\Utility\Session;

class AuthController
{
    public function index()
    {
        Session::session_init();
        if ($_SESSION['user_password'] === "verified")
        {
            header('Location: /UserProfile');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            include __DIR__ . '/../Views/auth.php';
            exit;
        }
        $email = $_POST['email'] ?? '';
        $user = User::findByEmail($email);
        $_SESSION['user_email'] = $email;
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
        Session::session_init();
        if ($_SESSION['user_password'] === "verified")
        {
            header('Location: /UserProfile');
            exit;
        }
        elseif (empty($_SESSION['user_id']))
        {
            header('Location: /Auth');
            exit;
        }
    
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            include __DIR__ . '/../Views/login.php';
            exit;
        }
        
        $password = $_POST['password'] ?? '';
        $user = User::findByEmail($_SESSION['user_email']);
        if (Auth::verify($user, $password))
        {
            header('Location: /UserProfile');
            exit;
        }
        else
        {
            header('Location: /Auth/login');
            exit;
        }

 
    }



    public function register()
    {
        Session::session_init();
        if ($_SESSION['user_password'] === "verified")
        {
            header('Location: /UserProfile');
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            include __DIR__ . ("/../Views/register.php");
            exit;
        }

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (User::findByEmail($email)) {
            $_SESSION['error'] = "Email already in use.";
            header('Location: /Auth/register');
            exit;
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