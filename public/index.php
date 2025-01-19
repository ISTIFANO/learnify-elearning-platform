<?php
 define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));

// require_once .'/DAOs\DaoGenerator.php';

// echo PROJECT_ROOT;
$route = $_SERVER['REQUEST_URI'];


// $page = $_GET['action'];

switch ($route) {
case '/Categories':
    // echo '\src\views\components\UtilisateursProfiles.php';
    // C:\wamp64\www\learnify-elearning-platform\views\components\UtilisateursProfiles.php
include '../views/components/UtilisateursProfiles.php';
break;
case '/login':
include '../views/pages/LogIn.php';
break;
case '/signUp':
    include '../views/pages/SignUp.php';
    break;
case 'Tags':
    include '../components/UtilisateursProfiles.php';
    break;
case 'users':
include '../components/Users.php';
break;
case '/':
    include '../views/cours/cours.php';
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