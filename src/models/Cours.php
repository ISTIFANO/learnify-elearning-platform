<?php 
//  namespace App;
// require_once '../../vendor/autoload.php';

//  use App\Tag;
//  use App\Categorie;

     require_once 'Categorie.php';
 


    class Cours
    {
        private int $id;
        private string $titre;
        private string $description;
         private string $contenue;
        private Categorie $categorie;
        private  $etudiants = [];
        private array $tags = [];
        private string $photo;



        public function __construct()
        {
// $this->categorie = new Categorie();
// $this->etudiants = new Utilisateur();


        }
        public function __call($name, $arguments) {
            if($name == "CoursBuilder"){
                if(count($arguments) == 2){
                    $this->titre = $arguments[0];
                    $this->description = $arguments[1];
                } 
                if(count($arguments) == 3){
                    $this->id = $arguments[0];
    
                    $this->titre = $arguments[1];
                    $this->description = $arguments[2];
                } 
                if(count($arguments) == 8){
            $this->id = $arguments[0];
            $this->titre = $arguments[1];
            $this->description =$arguments[2];
            $this->contenue =$arguments[3];
            $this->categorie =$arguments[4];

            $this->etudiants = $arguments[5];   

            $this->tags = $arguments[6];   

            $this->photo = $arguments[7];
                     } 
                     
                   
            }
        }
    

   

        public function getId(): int
        {
            return $this->id;
        }
        public function setId($id): void
        {
            $this->id = $id;
        }


        public function getTitre(): string
        {
            return $this->titre;
        } 
        public function setTitre($titre): void
        {
            $this->titre = $titre;
        }
        public function getContenue(): string
        {
            return $this->contenue;
        } 
        public function setContenue($contenue): void
        {
            $this->contenue = $contenue;
        }


        public function getDescription():string{
            return $this->description;
        }
        public function setDescription($description): void
        {
            $this->description = $description;
        }
        public function getCategorie(): Categorie
        {
            return $this->categorie;
        }
        public function setCategorie(Categorie $categorie): void
        {
            $this->categorie = $categorie;
        }



        public function getEtudiants(): array
        {
            return $this->etudiants;
        }
        public function setEtudians(array $etudiants): void
        {
            $this->etudiants = $etudiants; 
        }



        public function getTags(): array
        {
            return $this->tags;
        }
        public function setTags(array $tags): void
        {
            $this->tags = $tags; 
        }



        public function getPhoto(): string{
            return $this->photo;
        }
        public function setPhoto($photo): void
        {
            $this->photo = $photo;
        }



        public function __toString()
    {
        return "(Cour) => id : " .$this->id. 
        " , titre : " .$this->titre. 
        " , description  : " .$this->description. 
        " , Photo : " .$this->photo. 
        " , tags: " . implode(" , ", $this->tags) . 
        " , categorie: " .$this->categorie. 
        " , etudiant: " . implode(",", $this->etudiants) . ".";
    }






    }


