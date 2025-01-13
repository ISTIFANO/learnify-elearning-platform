<?php

// namespace App;
// require_once '../../vendor/autoload.php';

// use App\Etiquette;
require_once 'Etiquette.php';
class Categorie extends Etiquette
{ 
    public function __construct(){}

    public function __call($name, $arguments) {
        if($name == "CategorieBuilder"){
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

    public function __toString() {
        return parent::__toString();
    }

}