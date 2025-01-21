<?php 
require_once PROJECT_ROOT.'\src\DAOs\DaoGenerator.php';
// require_once PROJECT_ROOT.'\src\models\Cours.php';
// require_once PROJECT_ROOT.'\src\models\Utilisatuer.php';



class Inscription extends DaoGenerator{

private Utilisateur $etudiant;
private Cours $cours;
// private Utilisateur $etudiant ; 
private string $etudiant_id ;
private string $cours_id;
public function __construct()
{
    // $this->etudiant = new Utilisateur;
    $this->cours = new Cours;
}

    public function columns(): array {
        return [
            "cours_id" => $this->cours->getCours()->getId(),
            "etudiant_id" => $this->etudiant->getUser()->getId()
        ];
    }
    public function __call($name, $arguments)
    {
    if($name == "ConstructWithCour"){
        if(count($arguments)==1){
            $this->cours = $arguments[0];

        }

    }
    if($name == "ConstructWithUser"){
        if(count($arguments)==1){
            $this->etudiant = $arguments[0];
        }
    }
    }
    public function getCours(){
        return $this->cours ;
    }
    public function getUser(){
        return $this->etudiant ; 
    }
    public function tablename(): string {
        return 'inscription';
    }
    public function getCourId() {
        return $this->cours_id; 
   }
   
   public function getEtudiantId() {
    return $this->etudiant_id; 
}
public function setCours($cours){
    $this->cours=$cours;
    
}
public function setEtudiant($etudiant){
    $this->etudiant=$etudiant;
    
}






}















?>