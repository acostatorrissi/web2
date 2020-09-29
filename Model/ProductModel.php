<?php


class ProductModel{

    private $db;
    //instancio una vez la conexion para reutilizarla
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getProducts(){

        //obtiene los productos de la bbdd
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_categoria=2');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    }

    function getDrinks(){

        $query = $this->db->prepare('SELECT * FROM producto WHERE id_categoria=1');
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $drinks;
    }

    function addProducts($nombre, $descripcion, $precio, $id_categoria){
        $query = $this->db->prepare('INSERT INTO producto (descripcion, id_categoria, nombre, precio) VALUES (?,?,?,?)');
        $query->execute([$descripcion, $id_categoria, $nombre, $precio]);
    }

    function deleteProduct($id){
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($id));
    }


}

