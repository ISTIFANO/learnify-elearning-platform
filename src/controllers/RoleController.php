<?php 



 define('PROJECT_ROOT', dirname(dirname(dirname(__DIR__ . '/../'))));

require_once PROJECT_ROOT.'\src\models\Utilisateur.php';
 echo PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Services\RoleServices.php';


 
class RoleController{

    // private Utilisateur $user ;
    private RoleServices $roleservices ;
    public function __construct() {
        $this->roleservices = new RoleServices();
    }

    public function findAll(){
        try {
                      return   $this->roleservices->findAll();
         }
         catch(Exception $e){
            echo $e->getMessage();
         }
    }

    public function getbyName(){

        try{

            // return   $this->roleservices->getbyfields("firstname","Alice");


        }catch(Exception $e){

            echo $e->getMessage();

        }



    }
    
    
    public function FindById(){

        try{

            return   $this->roleservices->findRoleByid(3);


        }catch(Exception $e){

            echo $e->getMessage();

        }



    }
}




?>