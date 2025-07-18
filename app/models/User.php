<?php
namespace app\models;

require_once __DIR__ . '/../core/Database.php';

use app\core\Database;
use PDO;

class User {
    private $conn;

    public function __construct() {
        // Pega a conexão PDO da classe Database singleton
        $this->conn = Database::getInstance()->getConnection();
    }

    // Método para buscar usuário por email (exemplo)
    public function getUserByEmail(string $email) {
        // Query com placeholder nomeado :email
        $sql = "SELECT * FROM users WHERE email = :email";

        // Prepara a query (query preparada)
        $stmt = $this->conn->prepare($sql);

        // Liga o valor do parâmetro :email ao valor $email de forma segura
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Executa a query preparada
        $stmt->execute();

        // Retorna o resultado (associativo)
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
