<?php require_once PROJECT_ROOT.'\src\DAOs\DaoGenerator.php';

class Tag extends DaoGenerator {
    private int $id;
    private string $name;
    private string $description;

    public function __construct() {}

    public function __call($name, $arguments) {
        if($name == "TagBuilder"){
            if(count($arguments) == 2){
                $this->name = $arguments[0];
                $this->description = $arguments[1];
            } 
            if(count($arguments) == 1){
                $this->id = $arguments[0];
            } 
            if(count($arguments) == 3){
                $this->id = $arguments[0];
                $this->name = $arguments[1];
                $this->description = $arguments[2];
            } 
        }
    }

    public function tablename(): string {
        return 'tags';
    }

    public function columns(): array {
        return [
            "name" => $this->name,
            "description" => $this->description
        ];
    }

    public function getId(): int {
         return $this->id; 
    }
    public function getName(): string {
         return $this->name; 
    }
    public function getDescription(): string {
         return $this->description;
     }
}
?>