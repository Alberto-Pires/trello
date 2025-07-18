<?php
require_once 'app/core/Database.php';

use app\core\Database;

$pdo = Database::getInstance()->getConnection();

$email = 'teste@example.com';
$name = 'Alberto Sousa';
$password = '123456'; // senha em texto

// Cria o hash da senha usando password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':email' => $email,
    ':password' => $hashedPassword,
    ':name' => $name
]);

echo "Usuário criado com sucesso!";
