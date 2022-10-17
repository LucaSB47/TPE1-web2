<?php
require_once './app/model/game.model.php';
require_once './app/view/game.view.php';
require_once './app/model/genero.model.php';
require_once './app/helpers/auth.helper.php';

class GameController {
    private $game_model;
    private $generos_model;
    private $view;
    private $helper;

    public function __construct() {
        $this->game_model = new GameModel();
        $this->generos_model = new GenerosModel();
        $this->view = new GameView();
        $this->helper = new AuthHelper();

    }

    public function showAll() {
        $logIn = $this->helper->IsLoggedIn();
        $juegos = $this->game_model->getAllGames();
        $generos = $this->generos_model->getAllGeneros();
        $this->view->showGames($juegos, $generos, $logIn);
    }

    public function ShowDescriptionGame($id){
        $juegos = $this->game_model->getAllGames();
        $this->view->ShowDescriptionGame($juegos, $id);
    }
    public function showFormGame($id){
        $this->helper->checkLoggedIn();
        $game = $this->game_model->getGameById($id);
        $generos = $this->generos_model->getAllGeneros();
        $this->view->showFormGame($game, $generos);
        
    }

    public function GeneroList($idg){
        $logIn = $this->helper->IsLoggedIn();
        $juegos = $this->game_model->getAllGames();
        $generos = $this->generos_model->getAllGeneros();
        $this->view->ShowGenereList($juegos, $idg, $generos, $logIn);
        
    }

    function addGame() {
        $this->helper->checkLoggedIn();
        $juego = $_POST['juego'];
        $descripccion = $_POST['descripccion'];
        $idg = $_POST['idg'];
        $calificacion = $_POST['calificacion'];
        $img = $_FILES['gameimg']['tmp_name'];
        $precio = $_POST['precio'];
        if($_FILES['gameimg']['type'] == "image/jpg" || $_FILES['gameimg']['type'] == "image/jpeg" 
        || $_FILES['gameimg']['type'] == "image/png" ) {

            $this->game_model->insertGame($juego, $descripccion, $idg ,$precio, $calificacion, $img);
        }
        else
            {
                $id = $this->game_model->insertGame($juego, $descripccion, $idg ,$precio, $calificacion);
            }
         header("Location: " . BASE_URL); 
         
    }

    function editGame($id) {
        $this->helper->checkLoggedIn();
        $juego = $_POST['juego'];
        $descripccion = $_POST['descripccion'];
        $idg = $_POST['idg'];
        $calificacion = $_POST['calificacion'];
        $precio = $_POST['precio'];

        $this->game_model->editGame($juego, $descripccion, $idg ,$precio, $calificacion,$id);

        header("Location: " . BASE_URL); 
        
   }


   
    function deleteGame($id) {
        $this->helper->checkLoggedIn();
        $this->game_model->deleteGameById($id);
        header("Location: " . BASE_URL);
        
    }

}
