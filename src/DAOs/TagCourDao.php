<?php 

require_once PROJECT_ROOT . '\src\DAOs\DaoGenerator.php';

// require_once '..\DAOs\DaoGenerator.php';

class TagCourDao extends DaoGenerator{
   
    private $coursid ; 
    private $tagid ; 
  
  
    public function tablename(): string {
        return 'cours_tags';
    }

    public function columns () :array {
       
      
        return [ "cours_id"=>$this->coursid , "tag_id"=>$this->tagid];
    }

    public function setCourid($cour_id){
       
       $this->coursid= $cour_id;
    }
    public function seTagId($tag_id){


        $this->tagid = $tag_id ;
    }
    

}

?>