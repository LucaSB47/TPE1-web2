<?php

class GameModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_bd;charset=utf8', 'root', '');
    }


    public function getAllGames() {
        $query = $this->db->prepare("SELECT games.*, generos.nombre as generos FROM games JOIN generos ON games.genero_id = generos.genero_id");
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }


    public function insertGame($juego, $descripccion, $idg ,$precio, $calificacion, $img = null) {
        $pathImg = null;
        if ($img)
            $pathImg = $this->uploadImage($img);

        $query = $this->db->prepare("INSERT INTO games (nombre, descripcion, genero_id, calificacion, precio, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$juego, $descripccion, $idg, $calificacion, $precio, $pathImg]);    

        return $this->db->lastInsertId();
    }

    private function uploadImage($img){
        $target = 'img/game/' . uniqid() . '.jpg';
        move_uploaded_file($img, $target);
        return $target;
    }



    function editGame($juego, $descripccion, $idg ,$precio, $calificacion,$id) {
        $query = $this->db->prepare("UPDATE games SET nombre=?, descripcion=?, genero_id=?, calificacion=?, precio=? WHERE id =?");
        $query->execute([$juego, $descripccion, $idg ,$calificacion, $precio, $id]);
    }

    function deleteGameById($id) {
        $query = $this->db->prepare('DELETE FROM games WHERE id = ?');
        $query->execute([$id]);
    }

    public function getGameById($id) {
        $query = $this->db->prepare("SELECT games.*, generos.nombre as generos FROM games JOIN generos ON games.genero_id = generos.genero_id WHERE id = $id");
        $query->execute();
        $game = $query->fetch(PDO::FETCH_OBJ);

        return $game;
    }

}
