<?php
// AuthController.php
class AuthController {
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            try {
                $user = $this->authService->loginValidation($email, $password);
                if ($user) {
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'role' => $user->getRole()->getRoleName(),
                        'status' => $user->getIsValide()
                    ];
                    
                    // Redirect based on role
                    switch($user->getRole()->getRoleName()) {
                        case 'ADMIN':
                            header('Location: /DashboardAdmin');
                            break;
                        case 'TEACHER':
                            header('Location: /DashboardEnseignant');
                            break;
                        case 'STUDENT':
                            header('Location: /');
                            break;
                        default:
                            header('Location: /');
                    }
                    exit();
                }
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /login');
                exit();
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            $rolename = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
            
            $role = new Role();
            $role->RoleBuilder($rolename);
            
            $status = ($rolename == "STUDENT") ? "Pending" : "active";
            
            try {
                $user = new Utilisateur();
                $user->BuilderUser(
                    null, 
                    $firstname, 
                    $lastname, 
                    $email, 
                    $password, 
                    $phone, 
                    'default.png', 
                    $status, 
                    $role
                );
                
                $createdUser = $this->authService->create($user);
                if ($createdUser) {
                    $_SESSION['success'] = "Account created successfully!";
                    header('Location: /login');
                    exit();
                }
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                header('Location: /signup');
                exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit();
    }
}

// AuthService.php modifications
class AuthService extends Regex {
    public function loginValidation($email, $password) {
        if (!$this->ValidationEmail($email)) {
            throw new Exception("Invalid email format");
        }

        $user = $this->userServices->findbyEmailAndPassword($email, $password);
        if (!$user) {
            throw new Exception("Invalid credentials");
        }

        if ($user->getIsValide() !== 'active') {
            throw new Exception("Account is not active");
        }

        $user->setRole($this->roleServices->findRoleByid($user->getRoleId()));
        return $user;
    }
}