<?php

require_once PROJECT_ROOT . '\Services\UserServices.php';
require_once PROJECT_ROOT . '\Services\RoleServices.php';
require_once PROJECT_ROOT . '\Core\Utils\Regex.php';
require_once PROJECT_ROOT . '\Repositories\RepositoryGenerator.php';
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
        $user->setRole($this->roleServices->findRoleByname($user->getRole()->getname()));
        return $this->repository->create($user);
    }
    public function  loginValidation($email ,$password) {
        if($this->ValidationEmail($email)){
            $user = $this->userServices->findbyEmailAndPassword($email,$password);
            if(isset($user)){
            // var_dump($user);
               $user->SetRole($this->roleServices->findRoleByid($user->getId()));
               var_dump($user->getRole());
               return $user ;
            }
        }
        else {
            throw new Exception("email not valide  ");
        }
    }
    

}
