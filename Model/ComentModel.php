<?php

class ComentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM comentario');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getComent($id){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id=?');
        $query->execute([$id]);
        $coment = $query->fetch(PDO::FETCH_OBJ);

        return $coment;
    }

    function add($texto, $ranking, $id_usser, $id_producto){
        $query = $this->db->prepare('INSERT INTO comentario (texto, ranking, $id_usser, $id_producto) VALUES (?,?,?,?)');
        $query->execute([$texto, $ranking, $id_usser, $id_producto]);
        return $this->db->lastInsertId();
    }

    function delete($coment_id){
        $query = $this->db->prepare('DELETE * FROM comentario WHERE id=?');
        $query->execute([$id]);
        return $query->rowCount();
        //cuantas filas toco, actualizo borro
    }

}