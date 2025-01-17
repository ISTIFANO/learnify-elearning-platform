<?php

require_once PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\Services\RoleServices.php';

class AuthService {
    private UserServices $userServices;
    private RoleServices $roleServices;

    public function __construct() {
        $this->userServices = new UserServices();
        $this->roleServices = new RoleServices();
    }

    public function login($email, $password) {
        $users = $this->userServices->getbyfields('email', $email);
        
        if (empty($users)) {
            return ['error' => 'User not found'];
        }

        $user = $users[0];
       
        if (!password_verify($password, $user->getPassword())) {
            return ['error' => 'Invalid password'];
        }

        if ($user->getIsValide() !== '1') {
            return ['error' => 'Account not activated'];
        }
        return [
            'success' => true,
            'user' => $user,
            'message' => 'Login successful'
        ];
    }

    public function register($userData) {
        if (!isset($userData['email']) || !isset($userData['password'])) {
            return ['error' => 'Email and password are required'];
        }

        $existingUsers = $this->userServices->getbyfields('email', $userData['email']);
        if (!empty($existingUsers)) {
            return ['error' => 'Email already registered'];
        }

        $studentRole = $this->roleServices->getByFields('role_name', 'student')[0];

        $user = new Utilisateur();
        $user->BuilderUser(
            $userData['firstname'] ?? '',
            $userData['lastname'] ?? '',
            $userData['email'],
            password_hash($userData['password'], PASSWORD_DEFAULT),
            $userData['phone'] ?? '',
            $userData['photo'] ?? '',
            '0', 
            $studentRole
        );

        $result = $this->userServices->create($user);
        
        if ($result) {
            return [
                'success' => true,
                'message' => 'Registration successful. Please check your email to activate your account.'
            ];
        }

        return ['error' => 'Registration failed'];
    }
    public function verifyToken($token) {
                $users = $this->userServices->getbyfields('email', $token);
        
        if (empty($users)) {
            return null; 
        }
                $user = $users[0];
        return ['email' => $user->getEmail(), 'user_id' => $user->getId()];
    }
    public function activateAccount($token) {
        try {
            $tokenData = $this->verifyToken($token);
            if (!$tokenData) {
                return ['error' => 'Invalid or expired token'];
            }

            $users = $this->userServices->getbyfields('email', $tokenData['email']);
            if (empty($users)) {
                return ['error' => 'User not found'];
            }


            return ['success' => true, 'message' => 'Account activated successfully'];
        } catch (Exception $e) {
            return ['error' => 'Activation failed'];
        }
    }

}
