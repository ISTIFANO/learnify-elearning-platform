<?php
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\models\Categorie.php';

class CategorieServices {
    private Categorie $categorie;
    private RepositoryGenerator $repository;

    public function __construct() {
        $this->categorie = new Categorie();
        $this->repository = new RepositoryGenerator();
    }

  
    public function create($categorie) {
        if (!empty($categorie->getName())) {
            $createdCategorie = $categorie->setId($this->repository->create($categorie));
            return $createdCategorie;
        }
        return false;
    }


    public function getByFields($field, $value) {
        $categories = $this->repository->findByField($field, $value, "categories");
        return $categories;
    }

 
    public function deleteCategorie($id) {
        $categorieDeleted = $this->repository->delete("categories", $id);
        return $categorieDeleted;
    }

    public function findAll() {
        $categories = $this->repository->findAll("categories");
        return $categories;
    }

  
    public function findCategorieById($id) {
        $categorie = $this->repository->findOne($this->categorie, $id);
        // var_dump($categorie);
        return $categorie;
    }


    public function updateCategorie($categorie, $id) {
        if (!empty($categorie->getName())) {
            $updatedCategorie = $this->repository->update($categorie, $id);
            return $updatedCategorie;
        }
        return false;
    }


    public function countCategories() {
        return $this->repository->count("categories");
    }

    
    public function getCategoriesWithCourseCount() {
        $sql = "SELECT c.*, COUNT(co.id) as course_count 
                FROM categories c 
                LEFT JOIN cours co ON c.id = co.categorie_id 
                GROUP BY c.id";
        
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, "Categorie");
        } catch (Exception $e) {
            return [];
        }
    }
}