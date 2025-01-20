<?php 
//  define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

require_once PROJECT_ROOT . '\src\models\Tag.php';
require_once PROJECT_ROOT . '\src\Services\TagServices.php';

class TagsController {
    private TagServices $tagserveces;

    public function __construct() {
        $this->tagserveces = new TagServices();
    }

  
    public function getAllTags() {
        try {
            return $this->tagserveces->findAll();
        } catch(Exception $e) {
            // Log error
            return ['error' => $e->getMessage()];
        }
    }

  

   

    
}

