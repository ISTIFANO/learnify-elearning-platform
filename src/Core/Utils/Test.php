<?php 

require_once  '../../models/Categorie.php';
require_once '../../models/Tag.php';


require_once '../../models/Role.php';

require_once '../../models/Utilisateur.php';
require_once '../../models/Cours.php';


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
        $rolez = new Role;
        $rolez->TagBuilder("testTags","TagsTZZZESZ",$rolez);
    
        // var_dump($rolez);
        $user = new Utilisateur;
        $user->BuilderUser("admin@gmihsdhl.com","adsdLOve",);
        var_dump($user);
        $tagsA = new Tag;
        $tagsA->TagBuilder("testTags","TagsTZZZESZ");
    
        // var_dump($tagsA);
   
    
        $cat = new Categorie;
        $cat->CategorieBuilder(1,"testCATEGORIE","TestshCat");
    
    // var_dump($cat);
    
    $builder = new Cours;
    
    $builder->CoursBuilder(1,"Le Roi","azertyuiop","video.mp4",$cat,$user,   $tagsA ,"cover.png");
    var_dump($builder);
    
        
    }

}


$cours = new Test;
$cours->TestCours();













?>