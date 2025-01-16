<?php


class Aleart{


    public function Aleartmsg($type, $message) {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                  <strong>' . $message . '</strong>
                  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>';
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