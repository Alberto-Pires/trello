<?php
namespace app\controllers;

use app\middleware\AuthMiddleware;

class Dashboard1Controller {
    public function __construct() {
        // Call the authentication middleware to check session and token validity
        AuthMiddleware::handle();

        // If the user is authenticated, proceed to the dashboard
        $this->index();
    }

    public function index() {
        // At this point, the user session is valid
        include_once __DIR__ . '/../views/index/dashboard1.php';
    }
}
