<?php
namespace app\middleware;

class AuthMiddleware {
    public static function handle() {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        // Check if session has expired
        if (isset($_SESSION['session_expire']) && time() > $_SESSION['session_expire']) {
            // Session expired: clear and destroy
            session_unset();
            session_destroy();

            // Optionally, start a new session to show flash message
            session_start();
            $_SESSION['error'] = 'Session expired. Please log in again.';

            header("Location: /login");
            exit;
        }

        // Optional: Refresh session expiration to keep the user active
        $_SESSION['session_expire'] = time() + 60; // extend for 1 more minute
    }
}
