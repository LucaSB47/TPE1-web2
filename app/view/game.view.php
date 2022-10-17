<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class GameView {

    private $smarty;
    public function __construct() {
        $this->smarty = new Smarty();
    }


    function showGames($juegos, $generos, $logIn) {
        $this->smarty->assign('logueado', $logIn);
        $this->smarty->assign('juegos', $juegos);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('gameList.tpl');
    }

    function ShowDescriptionGame($juegos, $id){
        session_start();
        $this->smarty->assign('juegos', $juegos);
        $this->smarty->assign('id', $id);
        $this->smarty->display('gameDescrip.tpl');
    }

    function showFormGame($game, $generos){
        $this->smarty->assign('juego',$game);
        $this->smarty->assign('generos',$generos);
       $this->smarty->display('editFormGame.tpl');
    }

    function ShowGenereList($juegos, $idg, $generos, $logIn){
        $this->smarty->assign('logueado', $logIn);
        $this->smarty->assign('juegos', $juegos);
        $this->smarty->assign('idg', $idg);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('generoList.tpl');
    }
}
