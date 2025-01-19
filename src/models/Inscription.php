<?php 
require_once PROJECT_ROOT.'\src\DAOs\DaoGenerator.php';



class Inscription extends DaoGenerator{



    public function columns(): array {
        return [
           
        ];
    }



    public function tablename(): string {
        return 'inscription';
    }




}















?>