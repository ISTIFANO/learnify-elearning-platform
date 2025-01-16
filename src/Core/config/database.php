<?php 
class Database{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "elearning_platform";
    private static $connexion;
    private static $instance;
    public static $counter = 0;


    private function __construct(){
        if (!self::$connexion) {
            try {
                self::$connexion = new PDO(
                    "mysql:host=" . self::$servername . 
                    ";dbname=" . self::$dbname . 
                    ";charset=UTF8",
                    self::$username,
                    self::$password
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new Database();
            self::$counter++;
        }
            return self::$instance ;
        }
        
        public function getConnection(){
            return self::$connexion;
        }



       
}



$db =Database::getInstance()->getConnection();

if($db){
    echo"<h1>database has been connected</h1>";
}



?>