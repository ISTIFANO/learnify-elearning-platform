<?php 


require_once 'Role.php';
require_once PROJECT_ROOT.'\DAOs\DaoGenerator.php';

class Utilisateur extends DaoGenerator {
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $phone;
    private string $photo;
    private string $is_active;
    private Role $role;

    public function __construct() {}

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
        }
    }

    public function tablename(): string {
        return 'utilisateurs';
    }

    public function columns(): array {
        return [
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "email" => $this->email,
            "password" => $this->password,
            "is_active" => $this->is_active,
            "role_id" => $this->role->getId(),
            "photo" => $this->photo,
            "phone" => $this->phone
        ];
    }

    // Getters and setters
    public function setId(int $id): void { 
        $this->id = $id;
     }
    public function getId(): int {
        
        return $this->id; 
    
        }
    public function setFirstname(string $firstname): void { 
        
        $this->firstname = $firstname; 
    
    }
    public function getFirstname(): string { 
        return $this->firstname; 
    }
    public function setLastname(string $lastname): void { 
        $this->lastname = $lastname; 
    }
    public function getLastname(): string {
         return $this->lastname; 
    }
    public function setEmail(string $email): void { 
        $this->email = $email; 
    }
    public function getEmail(): string { 
        return $this->email;
     }
    public function setPassword(string $password): void {
         $this->password = $password; 
    }
    public function getPassword(): string { 
        return $this->password; 
    }
    public function setPhone(string $phone): void {
         $this->phone = $phone; 
    }
    public function getPhone(): string {
         return $this->phone;
     }
    public function setPhoto(string $photo): void { $this->photo = $photo;
     }
    public function getPhoto(): string { 
        return $this->photo; 
    }
    public function setIsValide(string $is_active): void { 
        $this->is_active = $is_active; 
    }
    public function getIsValide(): bool {
         return $this->is_active; 
    }
    public function setRole(Role $role): void {
         $this->role = $role; 
    }
    public function getRole(): Role {
         return $this->role; 
    }
}






// $userq = new Utilisateur();
// $userq->BuilderUser(1,"john@example.com", "password123");
// $table = $userq->tablename();
// var_dump($table);
// var_dump($userq);
// $userq->create();




?>

