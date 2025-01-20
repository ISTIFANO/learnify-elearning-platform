<?php

require_once PROJECT_ROOT . '\src\Services\UserServices.php';
require_once PROJECT_ROOT . '\src\Services\RoleServices.php';
require_once PROJECT_ROOT . '\src\Core\Utils\Regex.php';
require_once PROJECT_ROOT . '\src\Repositories\RepositoryGenerator.php';
class AuthService extends Regex {
    private UserServices $userServices;
    private RoleServices $roleServices;
    private RepositoryGenerator $repository;


    public function __construct() {
        $this->userServices = new UserServices();
        $this->roleServices = new RoleServices();
        $this->repository= new RepositoryGenerator();
        
    }
    public function create($user){
        // var_dump($user);
          var_dump($this->roleServices->findRoleByname($user->getRole()->getRoleName()));
        $user->setRole($this->roleServices->findRoleByname($user->getRole()->getRoleName()));
        var_dump(  $user);
        return $this->repository->create($user);
    }
    public function  loginValidation($email ,$password) {
        if($this->ValidationEmail($email)){
            $user = $this->userServices->findbyEmailAndPassword($email,$password);
            if(isset($user)){
    //  var_dump($user);

    //  var_dump(  $this->roleServices->findRoleByid($user->getId()));
               $user->SetRole($this->roleServices->findRoleByid($user->getRoleId()));
               var_dump($user->getRole());
               return $user ;
            }
        }
        else {
            throw new Exception("email not valide  ");
        }
    }
    

}
