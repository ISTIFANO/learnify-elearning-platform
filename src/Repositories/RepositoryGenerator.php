<?php 
require_once PROJECT_ROOT.'\src\Core\config\database.php';
require_once PROJECT_ROOT.'\src\DAOs\DaoGenerator.php';
// echo PROJECT_ROOT.'\views\components\GeneratorTableaux.php'; echo '</br>';
// require_once PROJECT_ROOT.'\views\components\GeneratorTableaux.php';



class RepositoryGenerator{

    private  $classes = [
        "utilisateurs" => Utilisateur::class,
        "cours" => Cours::class,
        "categories" => Categorie::class,
        "inscription" => Inscription::class,
        "roles" => Role::class,
        "tags" => Tag::class
    ];
    public function __construct()
    {
        
    }
    public function ClassesChecker($class)
    {
        foreach ($this->classes as $key => $value) {
            if ($class == $key) {
                return $value;
            }
        }
    }
    public function create($table){
// var_dump($table);
        return $table->create();
  }
  public function delete($table,$id){

    return $table->delete($id);
}
public function FindCoursById($table,$id){
    return $table->FindById($id);
}
public function update($table,$id){

    return $table->update($id);
}
public function findOne($table,$id){
     
   
    return $table->FindById($id);
}
public function read($table){
     
    //   var_dump($table);
        return $table->read();
    }

public function findAll($table) {


    $sql = "SELECT * FROM $table";
//  var_dump($sql);
    try {
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        // var_dump($stmt);

        $stmt->execute();
        // var_dump($stmt);
        if ($table !== 'cours') {
            $class = ucfirst(substr($table, 0, -1));            
            // var_dump($class);
        }else{
            $class = ucfirst($table);            

        }
        // $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

$result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
// var_dump($result);
return $result;
    } catch (Exception $e) {
        return [];
    }
}
public function findrolebyName($value,$table) {
        $sql = "SELECT * FROM $table WHERE role_name ='".$value."'";
      var_dump($sql);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([]);
            // var_dump($stmt);
            // if ($table !== 'cours') {
            //     $class = ucfirst(substr($table, 0, -1));            
            //     // var_dump($class);
            // }else{
            //     $class = ucfirst($table);            
    
            // }
            $result= $stmt->fetchObject($this->ClassesChecker($table));
            //  var_dump($result);
            return $result;
    
        } catch (Exception $e) {
            return [];
        }
    }
public function findByField(string $field, $value,$table) {
    echo $field, $value,$table;
    $sql = "SELECT * FROM $table WHERE $field ='".$value."'";
 echo($sql);
    try {
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
      
        if ($table !== 'cours' &&$table !== 'inscription') {
            $class = ucfirst(substr($table, 0, -1));            
            
        }else{
            $class = ucfirst($table);            

        }
        $result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
    //   var_dump($result);
        return $result;

    } catch (Exception $e) {
        return [];
    }
}
public function findbyEmailAndPassword($email ,$password) {
    $sql = "SELECT *  FROM utilisateurs WHERE email  = '" .$email  ."' AND password =  '" .$password ."';" ;
   
    $stmt =  Database::getInstance()->getConnection()->prepare($sql);
   
     $stmt->execute();

       return $stmt->fetchObject(Utilisateur::class);
     
  }
public function findByFieldSearch(string $field, $value,$table) {
      echo $field, $value,$table;
        $sql = "SELECT * FROM $table WHERE $field $value";
    // var_dump($sql);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            // var_dump($stmt);
            if ($table !== 'cours') {
                $class = ucfirst(substr($table, 0, -1));            
                // var_dump($class);
            }else{
                $class = ucfirst($table);            
    
            }
            $result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
            // var_dump($result[0]);
            return $result;
    
        } catch (Exception $e) {
            return [];
        }
    }

public function count($table) {
    $sql = "SELECT COUNT(*) as count FROM $table";
    try {
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (Exception $e) {
        return 0;
    }

 
}

public static function verificationClases($table){
    if ($table !== 'cours') {
        $class = ucfirst(substr($table, 0, -1));            
        var_dump($class);
    }else{
        $class = ucfirst($table);            

    }
    return  $class;
}




























}

















?>