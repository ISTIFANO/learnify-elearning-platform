<?php
//    define('PROJECT_ROOT', dirname(dirname(dirname(__DIR__ . '/../'))));
echo PROJECT_ROOT;
require_once PROJECT_ROOT . '\src\Services\UserServices.php';
require_once PROJECT_ROOT . '\src\Services\AuthService.php';
require_once PROJECT_ROOT . '\src\models\Utilisateur.php';
require_once PROJECT_ROOT . '\src\models\Role.php';

// require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
// C:\wamp64\www\learnify-elearning-platform\src\models\Utilisateur.php


 class AuthController {
    private AuthService $authservice ;
    private UserServices $userServices;
    public function __construct() {
        $this->authservice = new AuthService() ; 

        
    } 
   
    public function createUser(){
      $id=8;
        $lastname = "Aamir"; 
        $firstname = "Aamir"; 
$phone=234567890;
        $email = "aamir@mferble.com";
        $password = "4567890";
        $rolename = "STUDENT";
        $status = "active" ;
        if($rolename=="STUDENT"){
           $status = "Pending";
        }
        $photo = "asc.png";
        $role = new Role ; 
        $role->RoleBuilder($rolename);
        $user = new Utilisateur;
        $user->BuilderUser($id,$firstname , $lastname , $email , $password ,$phone,$photo ,$status , $role );


    }
    public function Login($email , $password ){
      try {
            $this->authservice->loginValidation($email , $password) ;

            // header("Location: /Categories");
      }
      catch(Exception $e){
         return $e->getMessage();
      }
    }
 }

 $AuthController = new AuthController();
$AuthController->Login("bob.martin@example.com","password456");
?>