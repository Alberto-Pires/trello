<?php
require_once '../app/models/User.php';

use app\models\User;

// Instancia o model User
$userModel = new User();

// Chama o método passando um email seguro (exemplo)
$result = $userModel->getUserByEmail('teste@example.com');

if ($result) {
    echo "Usuário encontrado:<br>";
    print_r($result);
} else {
    echo "Nenhum usuário encontrado com esse email.";
}
