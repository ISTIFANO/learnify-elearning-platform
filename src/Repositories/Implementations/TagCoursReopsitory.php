<?php 
require_once PROJECT_ROOT . '\src\DAOs\TagCourDao.php';
require_once PROJECT_ROOT . '\src\models\Cours.php';

//  require_once '../../DAOs/TagCourDao.php';


class TagCoursReopsitory {
    private Cours $cours;
    private TagCourDao $tagcourdao;
    public function __construct() {
        $this->tagcourdao = new TagCourDao;
    }
    public function create($cours_id,$tag_id){
        $this->tagcourdao->setCourId($cours_id);
        $this->tagcourdao->seTagId($tag_id);
        $this->tagcourdao->create();
    }
    public function foundById($id){
     
        $sql = "SELECT tag_id  FROM cours_tags WHERE cours_id   = " .$id .";" ;

        $stmt =Database::getInstance()->getConnection()->prepare($sql);
         $stmt->execute();
        //  $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);
        //  var_dump(   $resultat);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }
}
?>