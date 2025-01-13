<?php

include_once 'Etiquette.php';


class Categorie extends Etiquette
{ 
    public function __construct(){}

    public function __call($name, $arguments) {
        if($name == "CategorieBuilder"){
            if(count($arguments) == 2){
                $this->name = $arguments[0];
                $this->description = $arguments[1];
            } 
          
        }
    }

    public function __toString() {
        return parent::__toString();
    }

}