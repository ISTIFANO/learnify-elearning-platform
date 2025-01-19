<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<?php
require_once '../../src/controllers/UserController.php';

$userr = new UserController ;
$showall =$userr->getAllUsers();

//  var_dump($showall);
 
 ?>
<body >
                <!-- ================ Order Details List ================= -->
                <div class="details w-screen ">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                      
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table  >
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Name</td>

                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                                <td>Telephone</td>
                                <td>Opperation
                                     </td>



                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <?php foreach ($showall as $key) {
                                //   var_dump( $key);
                               echo '   <td width="60px">
                                <div class="imgBx"><img src=.'.$key->getPhoto().'. alt=""></div>
                            </td>';
                              echo'  <td> .'.$key->getFirstname().'.</td>
                                <td>.'.$key->getLastname().'.</td>
                                <td>.'.$key->getEmail().'.</td>
                                <td><span class="status delivered"> .'.$key->getIsValide().'.</span></td>
                                                                <td>.'.$key->getPhone().'.</td>
                                                                <td> <a href="../dashboard.php?updated="' .$key->getId(). '">
editer               
              </button>
              </a> <a href="../dashboard.php?deleted="'.$key->getId().'">
              supprimer
              </button>
              </a></td>

                            </tr>
                            ';
                        } ?>
                           
                            </tr>
                        </tbody>
                    </table>
                </div>

                <script src="../../public/js/main.js"></script>
            <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    
    </div>
</body>
</html>