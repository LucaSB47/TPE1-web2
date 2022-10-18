<?php
require_once './app/model/genero.model.php';
require_once './app/view/generos.view.php';
require_once './app/helpers/auth.helper.php';

class GeneroController{
    private $generos_model;
    private $generos_view;
    private $helper;


    public function __construct() {
        $this->generos_model = new GenerosModel();
        $this->generos_view = new GenerosView();
        $this->helper = new AuthHelper();

    }


    public function addGnero(){
        $this->helper->checkLoggedIn();
        $nombre = $_POST['nombreGenero'];
        $id = $this->generos_model->insertGnero($nombre);
        header("Location: " . BASE_URL); 
    }

    public function deleteGenero($genero_id){
        $this->helper->checkLoggedIn();
        $this->generos_model->deleteGeneroById($genero_id);
        header("Location: " . BASE_URL);
    }

    public function ShowFormGenero($idg){
        $this->helper->checkLoggedIn();
        $genero = $this->generos_model->getGeneroById($idg);
        $this->generos_view->ShowFormGenro($genero);
        
    }

    public function editGenero($idg){
        $this->helper->checkLoggedIn(); 
        $genero = $_POST['genero'];
        $this->generos_model->editGenero($genero, $idg);
        header("Location: " . BASE_URL); 
        
    }

}