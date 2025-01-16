<?php 
 define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT.'\models\Utilisateur.php';
 echo PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\Services\UserServices.php';


 
class UserController{

    // private Utilisateur $user ;
    private UserServices $userservice ;
    public function __construct() {
        $this->userservice = new UserServices();
    }

    public function getAllUsers(){
        try {
            echo "i m in getAllUsers ";
                      return   $this->userservice->findAll();
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
 var_dump($userr);
//  $varArr =$userr->getAllUsers();

// var_dump($use);
// echo 'jdsjn';
//  var_dump($use);















?>