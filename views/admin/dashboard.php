<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>

<body>
    <div class="container">
     
            <?php 
            include("../components/SideBar.php");
            ?>
               <div class="main">
         <?php
            // include("../components/search-bar.php");


            // include("../components/Reservation.php");    ?>
     

    <?php 
    
$page = $_GET['action'];

switch ($page) {
case 'Categories':
include '../components/UtilisateursProfiles.php';
break;
case 'Roles':
include '../components/UtilisateursProfiles.php';
break;
case 'Tags':
    include '../components/UtilisateursProfiles.php';
    break;
case 'users':
include '../components/Users.php';
break;
case 'Reservation':
    include '../components/UtilisateursProfiles.php';
    break;
    case 'Utilisateurs':
        include '../components/UtilisateursProfiles.php';

        break;
case 'Logout':
echo "<div class='content'>
    <h2>Déconnexion</h2>
    <p>Vous avez été déconnecté.</p>
</div>";
break;
case 'dashboard':
default:
break;
}
?>
   </div>
   </div>
    <script src="../../public/js/main.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>