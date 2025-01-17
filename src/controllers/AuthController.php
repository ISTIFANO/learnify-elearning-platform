<?php

require_once PROJECT_ROOT . '\Services\AuthService.php';

class AuthController {
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }
    public function login($data) {
        try {
            if (!isset($data['email']) || !isset($data['password'])) {
                return ['error' => 'Email and password are required'];
            }

            $result = $this->authService->login($data['email'], $data['password']);
            
            if (isset($result['success'])) {
                session_start();
                $_SESSION['user'] = $result['user']; 
            }

            return $result;
        } catch (Exception $e) {
            return ['error' => 'Login failed: ' . $e->getMessage()];
        }
    }

    public function register($data) {
        try {
            $required = ['email', 'password', 'firstname', 'lastname'];
            foreach ($required as $field) {
                if (!isset($data[$field]) || empty($data[$field])) {
                    return ['error' => "Field '$field' is required"];
                }
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return ['error' => 'Invalid email format'];
            }

            if (strlen($data['password']) < 8) {
                return ['error' => 'Password must be at least 8 characters long'];
            }

            return $this->authService->register($data);
        } catch (Exception $e) {
            return ['error' => 'Registration failed: ' . $e->getMessage()];
        }
    }

    public function logout() {
        try {
            session_start();
            session_destroy(); 
            return ['success' => true, 'message' => 'Logged out successfully'];
        } catch (Exception $e) {
            return ['error' => 'Logout failed'];
        }
    }


    public function activateAccount($token) {
        try {
            return $this->authService->activateAccount($token);
        } catch (Exception $e) {
            return ['error' => 'Account activation failed: ' . $e->getMessage()];
        }
    }

   

 

    public function isAuthenticated() {
        session_start();
        return isset($_SESSION['user']);
    }

 
    public function getCurrentUser() {
        session_start();
        return $_SESSION['user'] ?? null;
    }
}
