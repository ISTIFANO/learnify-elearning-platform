<?php


require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';



class TagServices
{

    private Tag $tags;
    private RepositoryGenerator $reposetery;

    public function __construct()
    {
        $this->reposetery = new RepositoryGenerator;
    }

    public function create($tag){
if(!empty($tag->getTag())){

$tagscreated =$tag->setId($this->reposetery->create($tag));


return $tagscreated;
}

    }
    public function getbyfields($fields,$value)
    {
        $Roleuser = $this->reposetery->findByField($fields,$value, "tags");
        return $Roleuser;
    }
public function DeleteTag($id){
    
$tagsDeleted =$this->reposetery->delete("tags",$id);

return $tagsDeleted ;
}
    public function findAll()
    {

        $tags = $this->reposetery->findAll("tags");

        return $tags;
      
    }
    public function findRoleByid($id)
    {

        $tagsId = $this->reposetery->findOne($this->tags,$id);
// var_dump( $tagsId);
        return $tagsId;
    }
 
}
