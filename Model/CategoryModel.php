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

    
    function getProductsFromCat($id){
        //obtiene los productos de la bbdd
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_categoria =  $id ");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;

    }
}


