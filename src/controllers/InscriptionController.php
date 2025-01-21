<?php 
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\src\models\Inscription.php';
require_once PROJECT_ROOT . '\src\Services\InscriptionServices.php';
require_once PROJECT_ROOT . '\src\Services\UserServices.php';


class InscriptionController {
    private InscriptionServices $InscriptionServices;
    // private CoursServices $CoursServices;
    // private UserServices $userservice;
    private Inscription $inscription;



    public function __construct() {
        $this->InscriptionServices = new InscriptionServices();
        // $this->userservice = new UserServices();
        // $this->userservice = new UserServices();
        // $this->CoursServices = new CoursServices();



    }  
    public function getEtudiantFromInscription($id){
        try {
            $siscrir = new Inscription();
        
            $user = new Utilisateur ; 
            $user->BuilderUser($id);
            $siscrir->ConstructWithUser($user);

             $userSinscrir=$this->InscriptionServices->getbyfields($siscrir, "etudiant_id");

            return  $userSinscrir;
        } catch(Exception $e) {
            // Log error
            return ['error' => $e->getMessage()];
        }
    }



   

    
}

$ma = new InscriptionController;
$ma->getEtudiantFromInscription($_SESSION["user"]["id"]);