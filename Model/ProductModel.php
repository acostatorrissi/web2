<?php


class ProductModel{   //BINDEAR TODO

    private $db;
    //instancio una vez la conexion para reutilizarla
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getProducts(){

        //obtiene los productos de la bbdd
        $query = $this->db->prepare('SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    }

    function getProductById($id){
        $query = $this->db->prepare("SELECT producto.*, categoria.url_imagen as img_url FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE id = ?");
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    function getProductsFromCat($id){
        //obtiene los productos de la bbdd por categoria
        $query = $this->db->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE producto.id_categoria = ? ");
        $query->execute([$id]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    }

    function addProducts($nombre, $descripcion, $precio, $id_categoria){
        $query = $this->db->prepare('INSERT INTO producto (descripcion, id_categoria, nombre, precio) VALUES (?,?,?,?)');
        $query->execute([$descripcion, $id_categoria, $nombre, $precio]);
    }

    function deleteProduct($id){
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($id));
    }

    function updateProduct($id, $nombre, $descripcion, $precio, $id_categoria){
        $query = $this->db->prepare("UPDATE producto SET descripcion=?, id_categoria=?, nombre=?,  precio=? WHERE id=?");
        $query->execute([$descripcion, $id_categoria, $nombre, $precio, $id]);
    }

    //probando paginacion

    function getProductsByPage($pagina, $tamanio_pagina){
        $query = $this->db->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria LIMIT $pagina, $tamanio_pagina");
        $query->execute([]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProductsQuantity(){
        $query = $this->db->prepare('SELECT COUNT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return count($products);
    }
}

