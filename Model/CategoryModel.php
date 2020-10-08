<?php


class CategoryModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getCategory(){
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }
  
    function addCategory($nombre){
        $query = $this->db->prepare('INSERT INTO categoria (nombre) VALUES (?)');
        $query->execute([$nombre]);
    }

    function editCategory($nombre, $id){
        $query = $this->db->prepare('UPDATE categoria SET nombre=? WHERE id_categoria=?');
        $query->execute(array($nombre, $id));
    }

    function deleteCategory($id){
        $query = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
        $query->execute(array($id));
    }
}


