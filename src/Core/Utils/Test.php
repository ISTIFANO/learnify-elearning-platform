<?php 

require_once  '../../models/Categorie.php';
require_once '../../models/Tag.php';


require_once '../../models/Role.php';

require_once '../../models/Utilisateur.php';
require_once '../../models/Cours.php';
require_once '../../DAOs/DaoGenerator.php';

// require_once  '../../../vendor/autoload.php'; 
// use App\Utilisateur;
// use App\Tag;
// use App\Categorie;
// use App\Role;
// use App\Cours;


class Test{

    public function __construct()
    {
        
    }
    
    public function TestCours() {
        $Roleuser = new Role;
        $Roleuser->RoleBuilder("testTags","TagsTZZZESZ");

        $user22 = new Utilisateur;

        $user22->BuilderUser(1,"admin@gmihsdhl.com","adsdLOve", $Roleuser);

    //    var_dump($user22);

        $user = new Utilisateur;
        $user->BuilderUser("admin@gmihsdhl.com","adsdLOve",);
        // $user->setEmail("admin@gmihsdhl.com");
        var_dump($user);
        $tagsA = [];
        $name = new Tag;
        $name->TagBuilder("testTags","TagsTZZZESZ");
        $tagsA []= $name ; 
        
        // var_dump($tagsA);
   
    
        $cat = new Categorie;
        $cat->CategorieBuilder(1,"testCATEGORIE","TestshCat");
        var_dump($cat);
    // var_dump($cat);
    
    $builder = new Cours;   
    var_dump($builder);
   $builder->CoursBuilder(1,"Le Roi","azertyuiop","video.mp4",$cat,$user,   $tagsA ,"cover.png");
   var_dump($builder);
    // return  $uduu;
    // private int $id;
    // private string $titre;
    // private string $description;
    //  private string $contenue;
    // private Categorie $categorie;
    // private  $etudiants = [];
    // private array $tags = [];
    // private string $photo;
        
    }

}


$cours = new Test;
// $cours->TestCours();

var_dump($cours);
// private int $id;
// private string $firstname;
// private string $lastname;
// private string $email;
// private string $password;
// private string $phone;
// private string $photo;
// private string $is_active;
// private Role $role;

$role = new Role;
$role->RoleBuilder(1,"testTags","TagsTZZZESZ");
$userq = new Utilisateur();
$userq->BuilderUser(1,"john@example.com", "password123","password123","sdsdd",2345678,"phoyo.png","panding",$role);
var_dump($userq);
$userq->delete(1);

var_dump($userq);
// $coursDao = new Cours();
// $coqurs->CoursBuilder("Title", "Description");
// $coqurs->create();










?>