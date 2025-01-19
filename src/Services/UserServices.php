<?php


require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\Services\RoleServices.php';



class UserServices
{

    private Utilisateur $Utilisateur;
    private RepositoryGenerator $reposetery;
    private RoleServices $roleServices;

    public function __construct()
    { $this->Utilisateur= new Utilisateur;
        $this->reposetery = new RepositoryGenerator;
        $this->roleServices = new RoleServices;
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
    
$userDeleted =$this->reposetery->delete($this->Utilisateur,$id);

return $userDeleted ;
}
public function findbyEmailAndPassword($email,$password){
    
    $findbyEmailAndPassword =$this->reposetery->findbyEmailAndPassword($email,$password,$this->Utilisateur);
    
    return $findbyEmailAndPassword ;
    }
    public function findAll()
    {

        // echo "#####################################################";

        $user = $this->reposetery->findAll("utilisateurs");
        // var_dump($user);
        foreach ($user  as $users) {
            $idrole = $this->roleServices->findRoleByid($users->getRoleId());
            // var_dump($idrole);
 $users->setRoleId($idrole)  ;


     }
    //   var_dump($users);
     return $user;
    }
    public function findbyId($id)
    {
        $user = $this->reposetery->findOne($this->Utilisateur,$id);

// var_dump(  $user);
        return $user;
    }
    public function countusers($table){
        $userCount = $this->reposetery->count($table);
        return $userCount;
    }
}
