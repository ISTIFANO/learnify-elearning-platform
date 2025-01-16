<?php

require_once  '../../models/Categorie.php';
require_once '../../models/Tag.php';
require_once '../../models/Role.php';
require_once '../../models/Utilisateur.php';
require_once '../../models/Cours.php';
require_once '../../DAOs/DaoGenerator.php';

// class Test for testing purposes
class Test {

    public function __construct() {
        // Constructor if needed (currently not used)
    }

    public function TestCours() {
        //  role 
        $roleUser = new Role;
        $roleUser->RoleBuilder("testTags", "TagsTZZZESZ");

        //  user 
        $user22 = new Utilisateur;
        $user22->BuilderUser(7, "admin@gmihsdhl.com", "adsdLOve", $roleUser);
        var_dump($user22);

        // user
        $user = new Utilisateur;
        $user->BuilderUser(7,"admin@gmihsdhl.com", "adsdLOve");
        var_dump($user);
        $utidiants = [];
        $utidiants[]=$user22;

        //tags
        $tagsA = [];
        $tagName = new Tag;
        $tagName->TagBuilder(1,"testTags", "TagsTZZZESZ");
        $tagsA[] = $tagName;

        //category
        $category = new Categorie;
        $category->CategorieBuilder(1, "testCATEGORIE", "TestshCat");
        var_dump($category);

        
        $user11 = new Utilisateur;
        $user11->BuilderUser(3,"admin@gmihsdhl.com", "adsdLOve");
        $userEtud = [];
        $userEtud[] = $user11;
        var_dump($userEtud);
        // $this->id = $arguments[0];
        // $this->titre = $arguments[1];
        // $this->description = $arguments[2];
        // $this->contenue = $arguments[3];
        // $this->categorie = $arguments[4];
        // $this->etudiants = $arguments[5];   
        // $this->teacher = $arguments[6];   

        // $this->tags = $arguments[7];   
        // $this->photo = $arguments[8];
        // course
      

        // role
        $role = new Role;
        $role->RoleBuilder(3, "testTags", "RagsTZZZESZ");
        $userq = new Utilisateur();
        $userq->BuilderUser(
            3, 
            "john@example.com", 
            "password123", 
            "password123", 
            "sdsdd", 
            2345678, 
            "photo.png", 
            "pending", 
            $role
        );
        var_dump($userq);
        $builder = new Cours;
        $builder->CoursBuilder(
            21,
            "Le Roi",
            "azertyuiop",
            "video4",
            $category,
            $utidiants,
            $user,  
            $tagsA,
            "cover.png"
        );
  
        var_dump($builder);

        // $ver =$builder->create();
        // var_dump($ver);

    }
}

$cours = new Test;
$cours->TestCours();

var_dump($cours);

?>
