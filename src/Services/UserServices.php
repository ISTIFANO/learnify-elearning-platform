<?php


require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
require_once PROJECT_ROOT . '\src\Services\RoleServices.php';
require_once PROJECT_ROOT . '\src\models\Utilisateur.php';



class UserServices
{

    private Utilisateur $Utilisateur;
    private RepositoryGenerator $reposetery;
    private RoleServices $roleServices;

    public function __construct()
    { 
        $this->Utilisateur= new Utilisateur;
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
    // die($id);
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
            // var_dump($this->roleServices->findRoleByid($users->getRoleId()));
            $users->setRole( $this->roleServices->findRoleByid($users->getRoleId()));
            // var_dump($users);
            
    
                    


     }
    return $user ;
    
    }
    public function findbyId($id)
    {
        $user = $this->reposetery->findOne($this->Utilisateur,$id);
        $user->setRole( $this->roleServices->findRoleByid($user->getRoleId()));

//  var_dump(  $user);
        return $user;
    }
    public function countusers($table){
        $userCount = $this->reposetery->count($table);
        return $userCount;
    }
}
