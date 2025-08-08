<?php
namespace app\models;

use app\core\Database;
use PDO;

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password) {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function saveResetToken($email, $token, $expires) {
        $query = "UPDATE users SET reset_token = :token, token_expire = :expires WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':token' => $token,
            ':expires' => $expires,
            ':email' => $email
        ]);
    }

    public function findByToken($token) {
        $query = "SELECT * FROM users WHERE reset_token = :token AND token_expire >= NOW()";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':token' => $token]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($userId, $newPasswordHash) {
        $query = "UPDATE users SET password = :password, reset_token = NULL, token_expire = NULL WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':password' => $newPasswordHash,
            ':id' => $userId
        ]);
    }
}
