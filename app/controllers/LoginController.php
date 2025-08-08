<?php
namespace app\controllers;

use app\models\User;

class LoginController {

    public function index() {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user_id']) && time() < $_SESSION['session_expire']) {
        header('Location: /dashboard1');
        exit;
    }


        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                // Store user info and secure token
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['session_token'] = bin2hex(random_bytes(32));

                // Set token/session expiration (1 minute)
                $_SESSION['session_expire'] = time() + 60; // 60 seconds from now

                // Redirect to dashboard
                header('Location: /dashboard1');
                exit;
            } else {
                $error = "Email or password incorrect";
            }
        }

        // Load login view
        include_once __DIR__ . '/../views/index/login.php';
    }
    
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Clear and destroy session
        session_unset();
        session_destroy();

        // Redirect to login
        header('Location: /login');
        exit;
    }
}
