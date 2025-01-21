<?php


require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\models\Inscription.php';




class InscriptionServices
{

    private Inscription $inscription;
    private RepositoryGenerator $reposetery;
    private UserServices $userservice ;
    private CoursServices $coursservice ;

    public function __construct()
    {
        $this->inscription = new Inscription();
        $this->reposetery = new RepositoryGenerator;
        $this->userservice = new UserServices ;
        $this->coursservice = new CoursServices ;
    }
    public function create($inscription){


$inscriptionscreated =$inscription->setId($this->reposetery->create($inscription));


return $inscriptionscreated;
}

        public function getbyfields($sinscrire , $column )
    {
    // echo     $sinscrire->getUser()->getId() ;
        $Inscription = $this->reposetery->findByField($column,$sinscrire->getUser()->getId(), "inscription");
        $arrayObjectsOffInscroptions = [];
        foreach ($Inscription as $item) {
            // var_dump($item);
        // var_dump($this->userservice->findByid($item->getEtudiantId()));
            $sinscrire->setEtudiant($this->userservice->findByid($item->getEtudiantId()));
            echo $item->getCourId();
            $sinscrire->setCours($this->coursservice->findCoursByid($item->getCourId()));
            var_dump($sinscrire->getUser());
            var_dump($sinscrire->getCours());
            die();
          
            $arrayObjectsOffInscroptions [] = $sinscrire ;
        }
        return $arrayObjectsOffInscroptions;
    }
public function DeleteTag($id){
$InscriptionD =$this->reposetery->delete("inscription",$id);
return $InscriptionD ;
}
    public function findAll()
    {
        $inscription = $this->reposetery->findAll("inscription");
// var_dump($inscription);
        return $inscription;
    }
    public function findByid($id)
    {
$idinscription =(int)$id;
        $inscriptionId = $this->reposetery->findOne($this->inscription,$idinscription);
// var_dump( $inscriptionId);
        return $inscriptionId;
    }
 
}
