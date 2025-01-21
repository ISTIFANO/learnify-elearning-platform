<?php
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Repositories\Implementations\TagCoursReopsitory.php';

require_once PROJECT_ROOT . '\src\models\Cours.php';
require_once PROJECT_ROOT . '\src\DAOs\TagCourDao.php';
require_once PROJECT_ROOT . '\src\Services\CategorieServices.php';
// echo PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\src\Services\UserServices.php';
require_once PROJECT_ROOT . '\src\Services\TagServices.php';
require_once PROJECT_ROOT . '\src\Services\RoleServices.php';
// require_once PROJECT_ROOT . '\src\Services\TagServices.php';



class CoursServices {
    private Cours $cours;
    private RepositoryGenerator $repository;
    private TagCoursReopsitory $repoTagsCours;
    private CategorieServices $categorieServices;
    private UserServices $userServices;
      private TagServices $tagServices;
private RoleServices $roleServices;
    public function __construct() {
        $this->cours = new Cours();
        $this->repository = new RepositoryGenerator();
        $this->categorieServices = new CategorieServices();
        $this->userServices = new UserServices();
        $this->roleServices = new roleServices();
        $this->repoTagsCours = new TagCoursReopsitory();
 $this->tagServices = new TagServices();
    }

  
    public function create($cours) {
        // var_dump($cours);
        if (!empty($cours->getTitre())) {
            // echo "##############################3";
            // var_dump($this->repository->create($cours));
          
            $cours->setId($this->repository->create($cours));
            
            // var_dump($cours);

            // echo "dfghjkl";
            return $cours;
        }
        return false;
    }

    public function getByFields($field, $value) {
        $courses = $this->repository->findByField($field, $value, "cours");

       var_dump($courses);
        return $courses;
    }
    public function findByFieldSearch($field, $value) {
        $courses = $this->repository->findByFieldSearch($field, $value, "cours");
        // var_dump($courses);
        return $this->surchargeCours($courses);
    }
    
    public function deleteCours($id) {
        return $this->repository->delete( $this->cours, $id);
    }

    public function findAll(){
        
        // var_dump($this->generalrepository->getAll($this->cour));
        $courses  =  $this->repository->read($this->cours);
        // var_dump( $courses);
        $arrayOfCours = []; 
        foreach($courses as $cour){
            $categorie = new Categorie ;
            $categorieservice= new CategorieServices ;
            $userservice = new UserServices ;
            // echo $cour->getId();
            $cour->setTeacher($userservice->findById($cour->getUserId()));
            $cour->setCategorie($categorieservice->findCategorieById($cour->getCategorieId()));
           $tags =  $this->repoTagsCours->foundById($cour->getId());
        //    die(  $tags );
           $tagsArr = []; 
           foreach($tags as $tag ){
           $tagsArr[] = $this->tagServices->findByid($tag->tag_id);
           }
           $cour->setTags($tagsArr);
           $arrayOfCours[] =  $cour ;
    }
    // var_dump($arrayOfCours);
    return $arrayOfCours ; 
}

public function findCoursId($id){
    $CoursById = $this->repository->FindCoursById($this->cours,$id);
// var_dump($CoursById);
return $CoursById;

}
    public function findCoursByid($id)
    {   
        // echo $id; 
        // die();
        $CoursById = $this->repository->FindCoursById($this->cours,$id);
       
        $arrayOfCours = []; 
        // var_dump($CoursById);
        foreach($CoursById as $cour){
            echo($cour->getUserId());
            // die();
            $categorie = new Categorie ;
            $categorieservice= new CategorieServices ;
            $userservice = new UserServices ;
           echo  $cour->getUserId();
            $cour->setTeacher($userservice->findById($cour->getUserId()));
            $cour->setCategorie($categorieservice->findCategorieById($cour->getCategorieId()));
           $tags =  $this->repoTagsCours->foundById($cour->getId());
           $arrayoftags = [];
           foreach($tags as $tag ){
           $arrayoftags[] = $this->tagServices->findByid($tag->tag_id);
           }
           $cour->setTags($arrayoftags);
           $arrayOfCours[] =  $cour ;
    }
    
    return $arrayOfCours ; 
//  var_dump( $CoursById);
        return $CoursById;
    }

 
    // public function findCoursById($id) {


    //     $cours = $this->repository->findOne($this->cours, $id);
    //     if ($cours) {
    //         return $this->surchargeCours([$cours])[0];
    //     }
    //     return null;
    // }

    public function updateCours($cours, $id) {
        if (!empty($cours->getTitre())) {
            return $this->repository->update($cours, $id);
        }
        return false;
    }

 
    public function addStudentToCourse($coursId, $studentId) {

    
        $sql = "INSERT INTO `inscription` (`etudiant_id`, `cours_id`, `date_inscription`) VALUES ($studentId,$coursId, CURRENT_TIMESTAMP);";
         var_dump($sql);
        try {
      
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
      
 var_dump( $stmt);
            $resultat = $stmt->execute();
            // var_dump($resultat);

            return   $resultat;
        } catch (Exception $e) {
            return false;
        }
    }

  
    public function removeStudentFromCourse($coursId, $studentId) {
        $sql = "DELETE FROM cours_etudiants WHERE cours_id = ? AND etudiant_id = ?";
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            return $stmt->execute([$coursId, $studentId]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function addTagToCourse($coursId, $tagId) {
        $sql = "INSERT INTO cours_tags (cours_id, tag_id) VALUES (? , ?)";
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$coursId, $tagId]);
        } catch (Exception $e) {
            return false;
        }
    }

 
    public function getCoursesByTeacher($teacherId) {
        return $this->getByFields("user_id", $teacherId);
    }

   
    public function getCoursesByCategory($categoryId) {
        return $this->getByFields("categorie_id", $categoryId);
    }


    public function countCourses() {
        return $this->repository->count("cours");
    }

    private function surchargeCours($courses) {
        foreach ($courses as $cours) {
            $categorie = $this->categorieServices->findCategorieById($cours->getCategorie()->getId());
            $cours->setCategorie($categorie);
            $teacher = $this->userServices->findById($cours->getTeacher()->getId());
            $cours->setTeacher($teacher);
            echo"#########################";
            var_dump($cours);
            $students = $this->getStudentsForCourse($cours->getId());
            $cours->setEtudiants($students);

            $tags = $this->getTagsForCourse($cours->getId());
            $cours->setTags($tags);
        }
        return $courses;
    }

  
    private function getStudentsForCourse($coursId) {
        $sql = "SELECT* FROM utilisateurs  
                JOIN cours  ON utilisateurs.id = cours.id 
                WHERE cours.id = ?";
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$coursId]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
        } catch (Exception $e) {
            return [];
        }
    }

   
    private function getTagsForCourse($coursId) {
        $sql = "SELECT t.* FROM tags t 
                JOIN cours_tags ct ON t.id = ct.id 
                WHERE ct.id = ?";
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$coursId]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Tag");
        } catch (Exception $e) {
            return [];
        }
    }
}