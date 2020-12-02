<?php

class CommentModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getComment($id){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id_producto=?');
        $query->execute([$id]);
        $coment = $query->fetchAll(PDO::FETCH_OBJ);

        return $coment;
    }

    function commentById($id){
        $query = $this->db->prepare('SELECT * FROM comentario WHERE id=?');
        $query->execute([$id]);
        $coment = $query->fetch(PDO::FETCH_OBJ);
        return $coment;
    }

    function add($texto, $ranking, $id_usser, $id_producto){
        $query = $this->db->prepare('INSERT INTO comentario(texto, ranking, id_usser, id_producto) VALUES (?,?,?,?)');
        $query->execute(array($texto, $ranking, $id_usser, $id_producto));
        return $this->db->lastInsertId();
    }

    function delete($id){
        $query = $this->db->prepare('DELETE FROM comentario WHERE id=?');
        $query->execute([$id]);
        return $query->rowCount();
        //cuantas filas toco, actualizo borro
    }

    
    function getCommentsOfProduct($id_producto){
        $query = $this->db->prepare('SELECT comentario.*, usser.email AS email_usser FROM comentario INNER JOIN usser ON comentario.id_usser = usser.id WHERE id_producto=?');
        $query->execute(array($id_producto));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}