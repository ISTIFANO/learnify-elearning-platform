<?php
//  define('PROJECT_ROOT', dirname(dirname(dirname(__DIR__ . '/../'))));


abstract class DaoGenerator
{

    private  $classes = [
        "utilisateurs" => Utilisateur::class,
        "cours" => Cours::class,
        "categories" => Categorie::class,
        "inscription" => Inscription::class,
        "roles" => Role::class,
        "tags" => Tag::class
    ];

    abstract public function tablename(): string;
    abstract public function columns(): array;

    public function ClassesChecker()
    {
        foreach ($this->classes as $key => $value) {
            if ($this->tableName() == $key) {
                return $value;
            }
        }
    }


    public function create()
    {
        $columns = $this->columns();
        $table = $this->tablename();

        $columnNames = implode(", ", array_keys($columns));
        $placeholders = implode(", ", array_fill(0, count($columns), "?"));
        $values = array_values($columns);

        $sql = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";
        // var_dump($sql);
        // var_dump($values);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            // var_dump($stmt);
            $stmt->execute($values);
            // echo "############################";

            $id =Database::getInstance()
                ->getConnection()
                ->lastInsertId();

        //    echo '<h1>'.  $id.'</h1>';

            return $id;
        } catch (Exception $e) {
            return false;
        }
    }


    public function FindById(int $id)
    {
        //  var_dump($id);
        $table = $this->tablename();
        $sql = "SELECT * FROM $table WHERE id = ?";
        //  echo ($sql);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$id]);

            // if ($table !== 'cours') {
            //     $class = ucfirst(substr($table, 0, -1));            
            //     var_dump($class);
            // }else{
            //     $class = ucfirst($table);            

         

            $result = $stmt->fetchObject($this->ClassesChecker());
        //   var_dump($result);
            return $result;
        } catch (Exception $e) {
            return null;
        }
    }

    public function read()
    {
        $table = $this->tablename();
        $sql = "SELECT * FROM $table";
    //    echo   $sql;
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            if ($table !== 'cours') {
                $class = ucfirst(substr($table, 0, -1));
                // var_dump($class);
            } else {
                $class = ucfirst($table);
            }
            // $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

            $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);

            // var_dump( $result);
            return $result;
        } catch (Exception $e) {
            return null;
        }
    }


    public function update(int $id): bool
    {
        $columns = $this->columns();
        $table = $this->tablename();

        $updates = [];
        foreach (array_keys($columns) as $column) {
            $updates[] = "$column = ?";
        }

        $updateString = implode(", ", $updates);
        $sql = "UPDATE $table SET $updateString WHERE id = ?";

        try {
            $values = array_values($columns);
            $values[] = $id;

            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            return $stmt->execute($values);
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        $table = $this->tablename();
        $sql = "DELETE FROM $table WHERE id = ?";

        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            return $stmt->execute([$id]);
        } catch (Exception $e) {
            return false;
        }
    }
}
