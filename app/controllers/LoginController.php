<?php
namespace app\controllers;

use app\models\User;

class LoginController {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                // Dados do usuário na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                // Redireciona para dashboard ou página protegida
                header('Location: /dashboard');
                exit;
            } else {
                $error = "Email ou senha incorretos";
            }
        }

        // Carrega a view, passando erro (se houver)
        include_once __DIR__ . '/../views/index/login.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
