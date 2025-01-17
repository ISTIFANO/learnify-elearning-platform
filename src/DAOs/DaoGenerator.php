<?php
require_once PROJECT_ROOT.'\Core\config\database.php';


abstract class DaoGenerator {
    abstract public function tablename(): string;
    abstract public function columns(): array;

    public function create(): bool {
        $columns = $this->columns();
        $table = $this->tablename();
        
        $columnNames = implode(", ", array_keys($columns));
        $placeholders = implode(", ", array_fill(0, count($columns), "?"));
        $values = array_values($columns);

        $sql = "INSERT INTO $table ($columnNames) VALUES ($placeholders)";
        var_dump( $sql );
        var_dump( $values );
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
             $stmt->execute($values);
          $id=  Database::getInstance()
->getConnection()
->lastInsertId();
return $id;
        } catch (Exception $e) {
            return false;
        }
    }
    

    public function FindById(int $id) {
        $table = $this->tablename();
        $sql = "SELECT * FROM $table WHERE id = ?";
        // var_dump($sql);
        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            // var_dump($resultat);
            return $resultat;
        } catch (Exception $e) {
            return null;
        }
    }

    public function read() {
        $table = $this->tablename();
        $sql = "SELECT * FROM $table WHERE id = ?";

        try {
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return null;
        }
    }


    public function update(int $id): bool {
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

    public function delete(int $id): bool {
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
?>