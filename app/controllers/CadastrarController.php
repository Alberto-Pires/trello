<?php
namespace app\controllers;

use app\models\User;

class CadastrarController {
    public function index() {
        // Show the registration form
        include_once __DIR__ . '/../views/index/cadastrar.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];

            $errors = [];

            // Basic validation
            if (empty($name) || empty($email) || empty($password) || empty($confirm)) {
                $errors[] = "All fields are required.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email address.";
            }

            if ($password !== $confirm) {
                $errors[] = "Passwords do not match.";
            }

            if (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters.";
            }

            if (empty($errors)) {
                $userModel = new User();
                $exists = $userModel->findByEmail($email);

                if ($exists) {
                    $errors[] = "Email already registered.";
                } else {
                    // Register the user with hashed password
                    $userModel->register($name, $email, $password);

                    // Redirect to login page after successful registration
                    header('Location: /login');
                    exit;
                }
            }

            // If there are errors, reload the registration form with errors
            include_once __DIR__ . '/../views/index/cadastrar.php';
        }
    }
}
