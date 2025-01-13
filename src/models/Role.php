<?php 
namespace App;


class Role {
    private int $id;
    private string $role_name;
    private string $role_description;

    public function __construct () {}

    public function __call($name, $arguments) {
        if($name == "RoleBuilder"){
            if(count($arguments) == 2){
                $this->role_name = $arguments[0];
                $this->role_description = $arguments[1];
            } 
            if(count($arguments) == 3){
                $this->id = $arguments[0];

                $this->role_name = $arguments[1];
                $this->role_description = $arguments[2];
            } 
            if(count($arguments) == 1){
                $this->id = $arguments[0];
            } 
          
        }
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $role_name) : void {
        $this->role_name = $role_name;
    }

    public function setDescription(string $description) : void {
        $this->role_description = $description;
    }

 

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->role_name;
    }

    public function getDescription(): string {
        return $this->role_description;
    }



    public function __toString() {

        return "(Role) => id : " . $this->id . " , name : " . $this->role_name . " , description : " . $this->role_description . "  ";
    }

    
}


?>





