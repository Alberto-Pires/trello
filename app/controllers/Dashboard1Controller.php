<?php
namespace app\controllers;

class Dashboard1Controller {
    public function __construct() {
        $this->index();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        include_once __DIR__ . '/../views/index/dashboard1.php';
    }
}
