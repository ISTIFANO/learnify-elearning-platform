<?php


require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\Services\RoleServices.php';



class UserServices
{

    // private Role $role;
    private RepositoryGenerator $reposetery;
    private RoleServices $roleServices;

    public function __construct()
    {
        $this->reposetery = new RepositoryGenerator;
    }

    public function create($user){
if(!empty($user->getEmail())){

$CreateUser =$user->setId($this->reposetery->create($user));


return $CreateUser;
}

    }
    public function getbyfields($fields,$value)
    {
        $user = $this->reposetery->findByField($fields,$value, "utilisateurs");
        return $user;
    }
public function DeleteUsers($id){
    
$userDeleted =$this->reposetery->delete("utilisateurs",$id);

return $userDeleted ;
}
    public function findAll()
    {

        $user = $this->reposetery->findAll("utilisateurs");
        foreach ($user  as $users) {
 $users->SetRole($this->roleServices->findRoleByid($users->getRoleId()))  ;
     }
//         return $user;
    }
    public function findbyId($id)
    {

        $user = $this->reposetery->findOne("utilisateurs",$id);

        return $user;
    }
    public function countusers($table){
        $userCount = $this->reposetery->count($table);
        return $userCount;
    }
}
