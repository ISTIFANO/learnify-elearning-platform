<?php
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\models\Cours.php';
require_once PROJECT_ROOT . '\Services\CategorieServices.php';
require_once PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\Services\TagServices.php';

class CoursServices {
    private Cours $cours;
    private RepositoryGenerator $repository;
    private CategorieServices $categorieServices;
    private UserServices $userServices;
    //  private TagServices $tagServices;

    public function __construct() {
        $this->cours = new Cours();
        $this->repository = new RepositoryGenerator();
        $this->categorieServices = new CategorieServices();
        $this->userServices = new UserServices();
        // $this->tagServices = new TagServices();
    }

  
    public function create($cours) {
        if (!empty($cours->getTitre())) {
            $createdCours = $cours->setId($this->repository->create($cours));
            return $createdCours;
        }
        return false;
    }

    public function getByFields($field, $value) {
        $courses = $this->repository->findByField($field, $value, "cours");
        return $this->loadCourseRelationships($courses);
    }

    
    public function deleteCours($id) {
        return $this->repository->delete("cours", $id);
    }

    public function findAll() {
        $courses = $this->repository->findAll("cours");
        var_dump($courses);
        return $this->loadCourseRelationships($courses);
    }

 
    public function findCoursById($id) {
        $cours = $this->repository->findOne($this->cours, $id);
        if ($cours) {
            return $this->loadCourseRelationships([$cours])[0];
        }
        return null;
    }

    public function updateCours($cours, $id) {
        if (!empty($cours->getTitre())) {
            return $this->repository->update($cours, $id);
        }
        return false;
    }

 
    public function addStudentToCourse($coursId, $studentId) {

       echo $coursId;
       echo $studentId;
        $sql = "INSERT INTO inscription (etudiant_id,cours_id) VALUES ($coursId,$studentId)";
        var_dump($sql);
        try {
      
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
      
var_dump( $stmt);
            $resultat = $stmt->execute();
            echo '<script>aleart("succ")</script>';
            var_dump($resultat);

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
        $sql = "INSERT INTO cours_tags (cours_id, tag_id) VALUES (?, ?)";
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            return $stmt->execute([$coursId, $tagId]);
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

    private function loadCourseRelationships($courses) {
        foreach ($courses as $cours) {
            $categorie = $this->categorieServices->findCategorieById($cours->getCategorie()->getId());
            $cours->setCategorie($categorie);

            $teacher = $this->userServices->findById($cours->getTeacher()->getId());
            $cours->setTeacher($teacher);

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