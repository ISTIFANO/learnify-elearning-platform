<?php 

// namespace 'script\Regex';

class Regex{
    
    public function  FullNameValidation($FullName){
        $pregMuchExpretion="/^[a-zA-Z]/";
        if(preg_match($pregMuchExpretion,$FullName)){
           
        return true;
        }
        return false;
    }
    public function  ValidationNumero($Numero){
        $pregMuchExpretion="/^[0-9]{9}/";
        if(preg_match($pregMuchExpretion,$Numero)){
           
        return true;
        }
        return false;
    }
    public function ValidationEmail($Email){

    $pregMuchExpretion="/^[a-zA-Z0-9]+@[a-zA-Z0-9\-]+[a-z]{2,3})/";
        if(preg_match($pregMuchExpretion,$Email)){
            return true;
        }
        return false;
    }



}
    
?>