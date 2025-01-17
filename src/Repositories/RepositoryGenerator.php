<?php 
require_once PROJECT_ROOT.'\Core\config\database.php';
require_once PROJECT_ROOT.'\DAOs\DaoGenerator.php';
// echo PROJECT_ROOT.'\views\components\GeneratorTableaux.php'; echo '</br>';
// require_once PROJECT_ROOT.'\views\components\GeneratorTableaux.php';



class RepositoryGenerator{


    public function __construct()
    {
    }

    public function create($table){

        return $table->create();
  }
  public function delete($table,$id){

    return $table->delete($id);
}
public function FindCoursById($table,$id){
// var_dump($table);
    return $table->FindById($id);
}
public function update($table,$id){

    return $table->update($id);
}
public function findOne($table,$id){
     
   
    return $table->FindById($id);
}

public function findAll($table) {


    $sql = "SELECT * FROM $table";
var_dump($sql);
    try {
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        // var_dump($stmt);

        $stmt->execute();
        var_dump($stmt);
        if ($table !== 'cours') {
            $class = ucfirst(substr($table, 0, -1));            
            var_dump($class);
        }else{
            $class = ucfirst($table);            

        }
        // $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

$result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
return $result;
    } catch (Exception $e) {
        return [];
    }
}
public function findByField(string $field, $value,$table) {
//    echo $field, $value,$table;
    $sql = "SELECT * FROM $table WHERE $field ='".$value."'";
var_dump($sql);
    try {
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        var_dump($stmt);
        if ($table !== 'cours') {
            $class = ucfirst(substr($table, 0, -1));            
            var_dump($class);
        }else{
            $class = ucfirst($table);            

        }
        $result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
        var_dump($result);
        return $result;

    } catch (Exception $e) {
        return [];
    }
}
public function findByFieldSearch(string $field, $value,$table) {
      echo $field, $value,$table;
        $sql = "SELECT * FROM $table WHERE $field $value";
    var_dump($sql);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            var_dump($stmt);
            if ($table !== 'cours') {
                $class = ucfirst(substr($table, 0, -1));            
                var_dump($class);
            }else{
                $class = ucfirst($table);            
    
            }
            $result= $stmt->fetchAll(PDO::FETCH_CLASS,$class);
            var_dump($result[0]);
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