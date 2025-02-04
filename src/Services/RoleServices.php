<?php


require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';



class RoleServices
{

    private Role $role;
    private RepositoryGenerator $reposetery;
    // private DaoGenerator $Dao;

    public function __construct()
    {
        $this->role = new Role;
        $this->reposetery = new RepositoryGenerator;
    }

    public function create($Roleuser){
if(!empty($Roleuser->getRoleName())){

$CreateRoleuser =$Roleuser->setId($this->reposetery->create($Roleuser));


return $CreateRoleuser;
}

    }
    public function getbyfields($fields,$value)
    {
        $Roleuser = $this->reposetery->findByField($fields,$value, "roles");
        return $Roleuser;
    }
    public function findRoleByname($name)
    {
        // var_dump($name);
        $Roleuser = $this->reposetery->findrolebyName($name, "roles");
        var_dump( $Roleuser);
        return $Roleuser;
    }
public function DeleteRoleusers($id){
    
$RoleuserDeleted =$this->reposetery->delete("roles",$id);

return $RoleuserDeleted ;
}
    public function findAll()
    {

        $Roleuser = $this->reposetery->findAll("roles");

        return $Roleuser;
      
    }
    public function findRoleByid($id)
    {
        // var_dump($id);

        $Roleuser = $this->reposetery->findOne($this->role,$id);
// var_dump( $Roleuser);
        return $Roleuser;
    }
 
}
