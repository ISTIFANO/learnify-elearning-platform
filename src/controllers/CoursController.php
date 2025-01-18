<?php 
 define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\models\Cours.php';
require_once PROJECT_ROOT . '\Services\CoursServices.php';
require_once PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\Services\CategorieServices.php';
require_once PROJECT_ROOT . '\Services\TagServices.php';

class CoursController {
    private CoursServices $coursServices;
    private UserServices $userServices;
    private CategorieServices $categorieServices;
    private TagServices $tagServices;

    public function __construct() {
        $this->coursServices = new CoursServices();
        $this->userServices = new UserServices();
        $this->categorieServices = new CategorieServices();
        $this->tagServices = new TagServices();
    }

  
    public function getAllCourses() {
        try {
            return $this->coursServices->findAll();
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


    public function getCourseById($id) {
        try {
            $course = $this->coursServices->findCoursById($id);
            if (!$course) {
                return ['error' => 'Course not found'];
            }

          
            return $course;
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

  
    public function createCourse($data) {
        try {
            if (!isset($data['titre']) || empty($data['titre'])) {


                return ['error' => 'Course title is required'];
            }
            if (!isset($data['categorie_id']) || !isset($data['teacher_id'])) {
                return ['error' => 'Category and teacher are required'];
            }
// echo '<h1>'.$data['id'].'</h1>';
            $categorie = $this->categorieServices->findCategorieById($data['categorie_id']);
            $teacher = $this->userServices->findById($data['teacher_id']);

            if (!$categorie || !$teacher) {
                return ['error' => 'error bcs invalid'];
            }

            $cours = new Cours();
            $cours->CoursBuilder(
                $data['id'],
                $data['titre'],
                $data['description'] ?? ''
            );
// var_dump( $cours);
// var_dump($categorie);
           $cours->setCategorie($categorie);


       $cours->setTeacher($teacher);
            $cours->setContenue($data['contenue'] ?? '');
// echo '<h1>'.$data['contenue'].'</h1>';

   $cours->setPhoto($data['photo'] ?? '');

//    var_dump($cours);
            $courses  = $this->coursServices->create($cours);
            echo gettype($courses);
            echo $courses->getId();
            // echo "ASCASCASCASCCCCCCASCCCCCCCCCCCCCCCCCCCCCCCCCCC";
            // var_dump($result);
           
                // var_dump($cour);
            // echo $cour->getId() ;
            foreach ($data['tags'] as $tagId) {
                // echo "####################################";
                
                $this->coursServices->addTagToCourse($courses->getId(), $tagId);
            }
        
      
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


    public function updateCourse($id, $data) {
        try {
            $existingCourse = $this->coursServices->findCoursById($id);
            if (!$existingCourse) {
                return   
                ['error' => 'error'];
            }

            if (isset($data['categorie_id'])) {
                $categorie = $this->categorieServices->findCategorieById($data['categorie_id']);
                if (!$categorie) {
                    return ['error' => 'error'];
                    ;
                }
                $existingCourse->setCategorie($categorie);
            }

            if (isset($data['titre'])) $existingCourse->setTitre($data['titre']);
            if (isset($data['description'])) $existingCourse->setDescription($data['description']);
            if (isset($data['contenue'])) $existingCourse->setContenue($data['contenue']);
            if (isset($data['photo'])) $existingCourse->setPhoto($data['photo']);

            $result = $this->coursServices->updateCours($existingCourse, $id);
            
            return $result ? 
            ['succ' => 'succ'] : 
                ['error' => 'error'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteCourse($id) {
        try {
            $result = $this->coursServices->deleteCours($id);
            return $result ? 
            ['succ' => 'succ'] : 
            ['error' => 'error'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

  
    public function AddStudentCours($courseId, $studentId) {
        try {
            $result = $this->coursServices->addStudentToCourse($courseId, $studentId);
            var_dump( $result);

            return $result ? 
                 ['succ' => 'succ'] : 
               ( ['error' => 'error']);

        } catch(Exception $e) {
            return var_dump( ['error' => $e->getMessage()]);
        }
    }

  
    public function removeStudentFromCourse($courseId, $studentId) {
        try {
            $result = $this->coursServices->removeStudentFromCourse($courseId, $studentId);
            return $result ? 
                ['suc' => 'Succ'] : 
                ['error' => 'Failed'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

   
    public function getCoursesByTeacher($teacherId) {
        try {
            return $this->coursServices->getCoursesByTeacher($teacherId);
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getCoursesByCategory($categoryId) {
        try {
            return $this->coursServices->getCoursesByCategory($categoryId);
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

  
    public function searchCourses($keyword) {
        try {
            $search = "LIKE '%" . $keyword . "%'";
            // var_dump(  $search);
            $resultat =  $this->coursServices->findByFieldSearch('titre', "$search");

            var_dump( $resultat);
            return $resultat;
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
    public function read(){
  
       
   $user= $this->coursServices->findAll();
    // var_dump( $user);

    }
} 

$coursController = new CoursController();

// $newCourse = $coursController->createCourse([
//     'id'=>22,
//     'titre' => 'PHP Avancé',
//     'description' => 'Formation PHP avancée',
//     'contenue' => 'Formation PHP avancée',
//     'photo' => 'png.JPEJ',
//     'categorie_id' => 2,
//     'teacher_id' => 5,
//     'tags' => [1, 2, 3]
// ]);         

$coursController->AddStudentCours(107,3);

//    $coursController->read();
// // Rechercher des cours
// $courses = $coursController->searchCourses('Python Programming');



?>