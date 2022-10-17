<?php

class GenerosModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=juegos_bd;charset=utf8', 'root', '');
    }

    public function getAllGeneros() {
        $query = $this->db->prepare("SELECT * FROM generos");
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }

    public function insertGnero($nombreGenero){
        $query = $this->db->prepare("INSERT INTO generos (nombre) VALUES (?)");
        $query->execute([$nombreGenero]);
        return $this->db->lastInsertId();
    }

    function deleteGeneroById($genero_id) {
        $query = $this->db->prepare('DELETE FROM generos WHERE genero_id = ?');
        $query->execute([$genero_id]);
    }
    function editGenero($genero, $idg){
        $query = $this->db->prepare("UPDATE generos SET nombre=? WHERE genero_id =?");
        $query->execute([$genero, $idg]);
    }

    public function getGeneroById($idg) {
        $query = $this->db->prepare("SELECT * FROM generos WHERE genero_id = $idg");
        $query->execute();
        $genero = $query->fetch(PDO::FETCH_OBJ);

        return $genero;
    }
}