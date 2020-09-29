<?php


class ProductModel{

    function getProducts(){

        //obtiene los productos de la bbdd
        $db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
        $query = $db->prepare('SELECT * FROM producto WHERE id_categoria=2');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    
    }

    function getDrinks(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
        $query = $db->prepare('SELECT * FROM producto WHERE id_categoria=1');
        $query->execute();
        $drinks = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $drinks;
    }


}

