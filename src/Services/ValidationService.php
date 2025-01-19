<!-- <?php
// namespace App\Services ;

use Exception;

class ValidationService {
    public function validatioEmail(string  $email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL )){
           return true ;
        }
        else {
          return false ;
                }
    }
}
?> -->