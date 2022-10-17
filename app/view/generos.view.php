<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class GenerosView {

    private $smarty;
    public function __construct() {
        $this->smarty = new Smarty();
    }

    public function showFormGame($genero){
        $this->smarty->assign('generos',$genero);
        $this->smarty->display('editFormGenero.tpl');
    }
}