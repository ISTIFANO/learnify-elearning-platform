<?php 
// define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\src\models\Categorie.php';
require_once PROJECT_ROOT . '\src\Services\CategorieServices.php';

class CategorieController {
    private CategorieServices $categorieServices;

    public function __construct() {
        $this->categorieServices = new CategorieServices();
    }

  
    public function getAllCategories() {
        try {
            return $this->categorieServices->findAll();
        } catch(Exception $e) {
            // Log error
            return ['error' => $e->getMessage()];
        }
    }

    public function getCategoryById($id) {
        try {
            $category = $this->categorieServices->findCategorieById($id);
            if (!$category) {
                return ['error' => 'Category not found'];
            }
            return $category;
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createCategory($data) {
        try {
            if (!isset($data['name']) || empty($data['name'])) {
                return ['error' => 'Category name is required'];
            }

            $category = new Categorie();
            $category->CategorieBuilder(
                $data['name'],
                $data['description'] ?? ''
            );

            $result = $this->categorieServices->create($category);
            if ($result) {
                return ['success' => 'Category created successfully', 'category' => $result];
            }
            return ['error' => 'Failed to create category'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    
    public function updateCategory($id, $data) {
        try {
            $existingCategory = $this->categorieServices->findCategorieById($id);
            if (!$existingCategory) {
                return ['error' => 'Category not found'];
            }

            $category = new Categorie();
            $category->CategorieBuilder(
                $id,
                $data['name'] ?? $existingCategory->getName(),
                $data['description'] ?? $existingCategory->getDescription()
            );

            $result = $this->categorieServices->updateCategorie($category, $id);
            if ($result) {
                return ['success' => 'Category updated successfully'];
            }
            return ['error' => 'Failed to update category'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    
    public function deleteCategory($id) {
        try {
            $result = $this->categorieServices->deleteCategorie($id);
            if ($result) {
                return ['success' => 'Category deleted successfully'];
            }
            return ['error' => 'Failed to delete category'];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

  
    public function getCategoriesWithCourses() {
        try {
            return $this->categorieServices->getCategoriesWithCourseCount();
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    
    public function searchCategories($name) {
        try {
            return $this->categorieServices->getByFields('name', $name);
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

 
    public function getCategoryStats() {
        try {
            $totalCategories = $this->categorieServices->countCategories();
            $categoriesWithCourses = $this->categorieServices->getCategoriesWithCourseCount();
            
            return [
                'total_categories' => $totalCategories,
                'categories_with_courses' => $categoriesWithCourses,
            ];
        } catch(Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    
}

$cat = new CategorieController;
$cat->getAllCategories();