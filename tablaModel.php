<?php


class ProductModel{

    function getProducts(){

        //obtiene los productos de la bbdd
        $db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
        $query = $db->prepare('SELECT * FROM producto');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    
    }


}

