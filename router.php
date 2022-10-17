<?php
require_once './app/controller/game.controller.php';
require_once './app/controller/generos.controller.php';
require_once './app/controller/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$GameController = new GameController();
$GeneroController = new GeneroController();
$authController = new AuthController();




$params = explode('/', $action);

switch ($params[0]) {
    case 'list':
        $GameController->showAll();
        break;
    case 'login':
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'register':
        $authController->showRegister();
        break;
    case 'addgame':
        $GameController->addGame();
        break;
    case 'addGnero':
        $GeneroController->addGnero();
        break;
    case 'game':
        $id = $params[1];
        $GameController->ShowDescriptionGame($id); 
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'delete':
        $id = $params[1];
        $GameController->deleteGame($id);
        break;
    case 'deleteGenero':
        $id = $params[1];
        $GeneroController->deleteGenero($id);
        break;
    case 'genero':
        $idg = $params[1];
        $GameController->GeneroList($idg);
        break;
    case 'editgeneroForm':
        $idg = $params[1];
        $GeneroController->ShowFormGenero($idg);
        break;
    case 'editGenero':
        $idg = $params[1];
        $GeneroController->editGenero($idg); 
        break;
    case 'editInputs':
        $id = $params[1];
        $GameController->showFormGame($id);
        break;
    case 'editGame':
        $id = $params[1];
        $GameController->editGame($id);
        break;
    default:
        echo('404 Page not found');
        break;
}


?>