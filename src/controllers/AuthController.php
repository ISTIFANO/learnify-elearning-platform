<?php
require_once PROJECT_ROOT . '\src\Services\AuthService.php';

class AuthController
{
   private AuthService $authService;

   public function __construct()
   {
      $this->authService = new AuthService();
   }

   public function login()
   {
      // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            var_dump($_SESSION['user']);
            // Redirect based on role
            switch ($user->getRole()->getRoleName()) {
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


   public function register()
   {
      // echo "vgbhnj,k;l:m";
      echo "AScascasc";
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // echo $_POST['firstname'];
         // echo "AScascascasc";
      
         $firstname = $_POST['firstname'];
         $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
         $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
         $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
         $rolename = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
 echo $rolename;
         $role = new Role();
         $role->RoleBuilder($rolename);

         if ($rolename == "STUDENT") {
            $status = "Pending";
         } else {
            $status = "active";
         }
         try {
            $user = new Utilisateur();
            $user->BuilderUser(
               1,
               $firstname,
               $lastname,
               $email,
               $password,
               $phone,
               'https://th.bing.com/th/id/OIP.qajuNYox10xSQV4SvryD1AHaHa?w=183&h=183&c=7&r=0&o=5&dpr=1.1&pid=1.7',
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
}
$ma = new AuthController ;
$ma->register();
