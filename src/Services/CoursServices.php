<?php
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\models\Cours.php';
require_once PROJECT_ROOT . '\Services\CategorieServices.php';
require_once PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\Services\TagServices.php';
require_once PROJECT_ROOT . '\Services\RoleServices.php';


class CoursServices {
    private Cours $cours;
    private RepositoryGenerator $repository;
    private CategorieServices $categorieServices;
    private UserServices $userServices;
    //  private TagServices $tagServices;
private RoleServices $roleServices;
    public function __construct() {
        $this->cours = new Cours();
        $this->repository = new RepositoryGenerator();
        $this->categorieServices = new CategorieServices();
        $this->userServices = new UserServices();
        $this->roleServices = new roleServices();

        // $this->tagServices = new TagServices();
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

        // var_dump($courses);
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

    public function findAll() {
        $courses = $this->repository->findAll("cours");
        foreach($courses as $cour){
            // ($cour->categorie_id);
            // echo $cour->categorie_id ;
               $category =  $this->categorieServices->findCategorieById($cour->categorie_id);
            //    var_dump();
               $categorie1 = new Categorie ; 
               $categorie1->CategorieBuilder($category['id'], $category['name'] , $category['description']);
              var_dump($cour->user_id);
               $user =   $this->userServices->findbyId($cour->user_id);
               

                        //    $user =   $this->userServices->findbyId($cour->user_id);

                  $user1 = new Utilisateur ;
                // //   var_dump( $user );
                  $user1->BuilderUser($user['id'],$user['firstname'],$user['lastname'],$user['email'],$user['password'],$user['phone'],$user['photo'],$user['is_active']) ;
                  $cour->setTeacher($user1);
                  $cour->setCategorie($categorie1);
                 return $cour ; 
                //   $CoursHasIduser = $this->findCoursById($user['id']);
                //   var_dump( $CoursHasIduser);   
        }
        // return $courses;
        // $categorie = new Categorie ; 
        // $categorie->CategorieBuilder();
    
        // echo "####################";
        // var_dump($courses);
        // return $this->surchargeCours($courses);
    }
    public function findCoursByid($id)
    {

        $CoursById = $this->repository->FindCoursById($this->cours,$id);
 var_dump( $CoursById);
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
        return $this->getByFields("id", $teacherId);
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