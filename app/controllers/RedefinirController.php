<?php
namespace app\controllers;

use app\models\User;

class RedefinirController {
    public function index() {
        $token = $_GET['token'] ?? '';
        $userModel = new User();
        $user = $userModel->findByToken($token);

        if (!$user) {
            echo "Token inválido ou expirado.";
            return;
        }

        include_once __DIR__ . '/../views/index/redefinir.php';
    }
}
