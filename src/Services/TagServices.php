<?php


require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Repositories\Implementations\TagCoursReopsitory.php';
require_once PROJECT_ROOT . '\src\models\Tag.php';




class TagServices
{

    private Tag $tags;
    private RepositoryGenerator $reposetery;
    private TagCoursReopsitory $repoTagsCours;

    public function __construct()
    {
        $this->tags = new Tag();
        $this->reposetery = new RepositoryGenerator;
        $this->repoTagsCours = new TagCoursReopsitory();

    }

    public function create($tag){
if(!empty($tag->getTag())){

$tagscreated =$tag->setId($this->reposetery->create($tag));


return $tagscreated;
}

    }
    public function getbyfields($fields,$value)
    {
        $tags = $this->reposetery->findByField($fields,$value, "tags");
        return $tags;
    }
public function DeleteTag($id){
    
$tagsDeleted =$this->reposetery->delete("tags",$id);

return $tagsDeleted ;
}
    public function findAll()
    {

        $tags = $this->reposetery->findAll("tags");
// var_dump($tags);
        return $tags;
      
    }
    public function findByid($id)
    {
$idTag =(int)$id;
        $tagsId = $this->reposetery->findOne($this->tags,$idTag);
// var_dump( $tagsId);
        return $tagsId;
    }
 
}
