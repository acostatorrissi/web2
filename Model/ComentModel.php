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

    function add($texto, $ranking){
        $query = $this->db->prepare('INSERT INTO comentario (texto, ranking) VALUES (?,?)');
        $query->execute([$texto, $ranking]);
        return $this->db->lastInsertId();
    }

    function delete($coment_id){
        $query = $this->db->prepare('DELETE * FROM comentario WHERE id=?');
        $query->execute([$id]);
        return $query->rowCount();
        //cuantas filas toco, actualizo borro
    }

    function update($texto, $ranking, $id){
        $query = $this->db->prepare("UPDATE comentario SET texto=?, ranking=? WHERE id=?");
        $query->execute([$texto, $ranking, $id]);
        return $query->rowCount();
    }
}