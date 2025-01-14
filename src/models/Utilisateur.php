<?php
//   namespace App;
//  require_once '../../vendor/autoload.php';

//  use App\Role;

require_once 'Role.php';

class Utilisateur{

    private int $id ;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $phone;
    private string $photo;
    private bool $is_active;
    private Role $role;

    public function  __construct()
    {

        // $role = new Role();
        
    }

    public function __call($name, $arguments) {
        if($name == "BuilderUser"){
            if(count($arguments) == 2){
                $this->email = $arguments[0];
                $this->password = $arguments[1];
            } 
            if(count($arguments) == 3){
                $this->id = $arguments[0];
                $this->firstname = $arguments[1];
                $this->lastname = $arguments[2];
            } 
       
            if(count($arguments) == 9){
                $this->id = $arguments[0];
                $this->firstname = $arguments[1];
                $this->lastname = $arguments[2];
                $this->email = $arguments[3];
                $this->password = $arguments[4];
                $this->phone = $arguments[5];
                $this->photo = $arguments[6];

                $this->is_active = $arguments[7];

                $this->role = $arguments[8];

            } 
            if(count($arguments) == 4){
                $this->id = $arguments[0];
                $this->firstname = $arguments[1];
                $this->lastname = $arguments[2];
                $this->role = $arguments[3];

            }
        }
    }



    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email) :void {
        $this->email = $email;
    }
    public function setIsValide(string $is_active) :void {
        $this->is_active = $is_active;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
    public function setPhone(string $phone):void {
        $this->phone = $phone;
    }

    public function setPhoto(string $photo):void {
        $this->photo = $photo;
    }
    public function getRole(): string
    {
        return $this->role;
    } 
    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getPassword(): string {
        return $this->password;
    }
    public function getIsValide() :bool {
      return  $this->is_active;
    }
  

 
    public function getPhoto(): string {
        return $this->photo;
    }


}




// $builder = new Utilisateur;
// $builder->Builder("admin@gmail.com","adminLOve");
// var_dump($builder);


// $builder1 = new Utilisateur;
// $builder1->Builder(1,"Aamir","lastName","admin@gmail.com","adminLOve",1234567890,"tae.png",true,"Admine");
// var_dump($builder1);









?>