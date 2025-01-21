<?php
define('PROJECT_ROOT', dirname(dirname(__DIR__ . '/../')));
require_once PROJECT_ROOT . '\src\Services\UserServices.php';
// require_once PROJECT_ROOT . '\src\Services\UserServices.php';

session_start();
// C:\wamp64\www\learnify-elearning-platform\src\controllers\AuthController.php
require_once PROJECT_ROOT . '\src\controllers\AuthController.php';
require_once PROJECT_ROOT . '\src\controllers\CategorieControler.php';
require_once PROJECT_ROOT . '\src\controllers\UserController.php';

require_once PROJECT_ROOT . '\src\controllers\CoursController.php';

$route = $_SERVER['REQUEST_URI'];



switch ($route) {

    case '/deletedUser':
        $deletedUses = new UserController();
        $deletedUses->deleteUsers($_POST["user_id"]);
        header("location: /utilisateurs");
        break;

    case '/Categories':
        require_once '../views/cours/CategoriesAdmin.php';
        break;
    case '/SupprimerCat':
        $categoeie = new CategorieController();
        $categoeie->deleteCategory($_POST["course_id"]);
        header("location: /Categories");
        break;
    case '/DashboardAdmin':

        require_once '../views/admin/dashboard.php';
        break;
    case '/SinscrirCours':

        $categoeie = new CoursController();
        $categoeie->AddStudentCours($_SESSION["user"]["id"], $_POST["siscrir"]);
        header("location: /MesCoursEtudiant");

        break;
    case '/DashboardEtudiant':
        // C:\wamp64\www\learnify-elearning-platform\views\Etudiant\dashboard.php
        require_once '../views/Etudiant/dashboard.php';
        break;
        case '/CoursDetails':
            require_once '../views/cours/CoursDetails.php';
            break;
    case '/MesCoursEtudiant':
        require_once '../views/Etudiant/MesCoursEtudiant.php';
        break;
    case '/Allcources':
        require_once '../views/Etudiant/Allcources.php';
        break;
    case '/login':
        require_once '../views/pages/LogIn.php';
        break;
    case '/signUp':

        require_once '../views/pages/SignUp.php';

        break;
    case '/Tags':
        require_once  '../views/cours/TagsAdmin.php';
        break;
    case '/Courses':
        require_once  '../views/cours/CourShowingAdmin.php';
        break;
    case '/users':
        require_once '../views/cours/CourShowingAdmin.php';
        break;
    case '/':
        require_once '../views/cours/cours.php';
        break;
    case '/utilisateurs':
        require_once '../views/components/Users.php';

        break;

    case '/AuthController':
        $ma = new AuthController;
        $ma->register();
        header("location: /login");
        // include '../src/controllers/AuthController.php';
        break;

    case '/CoursController':

        // header("location: /login");
        // C:\wamp64\www\learnify-elearning-platform\src\controllers\CoursController.php
        require_once '../src/controllers/InscriptionController.php';
        break;
    case '/auth/login':
        $ma = new AuthController;
        $ma->login();
        // include '../src/controllers/AuthController.php';
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
        echo $_SESSION["user"];
        break;
    case 'dashboard':
    default:
        break;
}
