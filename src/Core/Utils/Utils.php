<?php

define('BASE_URL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" . "://" . $_SERVER['HTTP_HOST']);
class Utils{


    public function Aleartmsg($type, $message) {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                  <strong>' . $message . '</strong>
                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>';
      }


public static function redirect($page) {
  $home_url = BASE_URL;
  header('location: ' . $home_url . '/' . $page);
}

public static function isLoggedIn() {
  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}


} 

// echo Aleart::Aleartmsg('success', 'Opération réussie!');

// <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

// class Aleart {

//     public static function Aleartmsg($type, $message) {
//         // Type mapping for SweetAlert
//         $swalType = match($type) {
//             'success' => 'success',
//             'danger' => 'error',
//             'warning' => 'warning',
//             'info' => 'info',
//             default => 'question',
//         };

//         // Generate the SweetAlert script
//         return '<script>
//                 Swal.fire({
//                     icon: "' . $swalType . '",
//                     title: "' . ucfirst($swalType) . '",
//                     text: "' . $message . '",
//                     confirmButtonText: "OK"
//                 });
//                 </script>';
//     }

// }

















?>