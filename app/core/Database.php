<?php
namespace app\core;

use PDO;
use PDOException;

require_once __DIR__ . '/../core/EnvLoader.php';
EnvLoader::load(__DIR__ . '/../../../.env'); // Carrega as variáveis do .env

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Lê as variáveis de ambiente com suporte a diferentes fontes
        $host    = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: 'localhost';
        $dbname  = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: 'trello';
        $user    = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: 'root';
        $pass    = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: '';
        $charset = $_ENV['DB_CHARSET'] ?? getenv('DB_CHARSET') ?: 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        try {
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "✅ Ligação segura estabelecida.";
        } catch (PDOException $e) {
            die("❌ Erro: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
