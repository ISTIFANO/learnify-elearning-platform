<?php 
//  define('PROJECT_ROOT', dirname(dirname(dirname(__DIR__ . '/../'))));

require_once PROJECT_ROOT.'\src\models\Utilisateur.php';
//  echo PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Services\UserServices.php';
require_once PROJECT_ROOT . '\src\Services\RoleServices.php';



 
class UserController{

    // private Utilisateur $user ;
    private UserServices $userservice ;
    private RoleServices $roleservice ;


    public function __construct() {
        $this->userservice = new UserServices();
        $this->roleservice = new RoleServices();

    }
    
    public function deleteUsers($id){
        try {
            // die($id);
            // echo "i m in getAllUsers ";
            $users = $this->userservice->deleteUsers($id);
              // var_dump($users);
      
        
                      return    $users;

         }
         catch(Exception $e){
            echo $e->getMessage();
         }
    }

    public function getAllUsers(){
        try {
            // echo "i m in getAllUsers ";
            $users = $this->userservice->findAll();
              // var_dump($users);
      
        
                      return    $users;

         }
         catch(Exception $e){
            echo $e->getMessage();
         }
    }

    public function getbyName(){

        try{

            return   $this->userservice->getbyfields("firstname","Alice");


        }catch(Exception $e){

            echo $e->getMessage();

        }



    }
}
 $userr = new UserController ;
// //  $userr->getbyName() ;
 $userr->getAllUsers();
//  var_dump($userr);
//  $varArr =$userr->getAllUsers();

// var_dump($use);
// echo 'jdsjn';
//  var_dump($use);















?>