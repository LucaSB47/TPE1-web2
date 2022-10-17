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



$params = explode('/', $action);

switch ($params[0]) {
    case 'list':
        $GameController = new GameController();
        $GameController->showAll();
        break;
    case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'addgame':
        $GameController = new GameController();
        $GameController->addGame();
        break;
    case 'addGnero':
        $GeneroController = new GeneroController();
        $GeneroController->addGnero();
        break;
    case 'game':
        $id = $params[1];
        $GameController = new GameController();
        $GameController->ShowDescriptionGame($id); 
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'delete':
        $id = $params[1];
        $GameController = new GameController();
        $GameController->deleteGame($id);
        break;
    case 'deleteGenero':
        $id = $params[1];
        $GeneroController = new GeneroController();
        $GeneroController->deleteGenero($id);
        break;
    case 'genero':
        $idg = $params[1];
        $GameController = new GameController();
        $GameController->GeneroList($idg);
        break;
    case 'editgeneroForm':
        $idg = $params[1];
        $GeneroController = new GeneroController();
        $GeneroController->ShowFormGenero($idg);
        break;
    case 'editGenero':
        $idg = $params[1];
        $GeneroController = new GeneroController();
        $GeneroController->editGenero($idg); 
        break;
    case 'editInputs':
        $id = $params[1];
        $GameController = new GameController();
        $GameController->showFormGame($id);
        break;
    case 'editGame':
        $id = $params[1];
        $GameController = new GameController();
        $GameController->editGame($id);
        break;
    default:
        echo('404 Page not found');
        break;
}


?>