<?php
define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));
require_once PROJECT_ROOT .'\src\Services\UserServices.php';
session_start();



    function requireAuth() {
        if (!Utils::isLoggedIn()) {
            Utils::redirect("login");
            exit();
        } ;
     }

$route = $_SERVER['REQUEST_URI'];



switch ($route) {
    case '/Categories':
        // echo '\src\views\components\UtilisateursProfiles.php';
        // C:\wamp64\www\learnify-elearning-platform\views\components\UtilisateursProfiles.php
        include '../views/cours/CategoriesAdmin.php';
        break;
        case '/DashboardAdmin':
           
            include '../views/admin/dashboard.php';
            break;
    case '/login':
        include '../views/pages/LogIn.php';
        break;
    case '/signUp':
        
        include '../views/pages/SignUp.php';

        break;
    case '/Tags':
        include  '../views/cours/TagsAdmin.php';
        break;
        case '/Courses':
            include  '../views/cours/CourShowingAdmin.php';
            break;
    case '/users':
        include '../views/cours/CourShowingAdmin.php';
        break;
    case '/':
        include '../views/cours/cours.php';
        break;
    case '/utilisateurs':
        include '../views/components/Users.php';

        break;

    case '/AuthController': 
    
        include '../src/controllers/AuthController.php';
        break;
        case '/DashboardEnseignant':
            include '../views/Enseignant/statistic.php';
            break;
            case '/MesCoursEnseignant':
                include '../views/Enseignant/MesCours.php';
                break;
                case '/EtudiantdeEnseignant':
                    include '../views/Enseignant/Etudiant.php';
                    break;
    case 'LogoutAdmin':
        echo "<div class='content'>
    <h2>Déconnexion</h2>
    <p>Vous avez été déconnecté.</p>
</div>";
        break;
    case 'dashboard':
    default:
        break;
}
