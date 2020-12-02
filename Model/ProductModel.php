<?php


class ProductModel{   

    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_productos;charset=utf8','root','');
    }

    function getProducts($criterio = null){

        if($criterio == null){
            $criterio = "";
        }

        $query = $this->db->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria $criterio");
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    }

    function getProductById($id){
        $query = $this->db->prepare("SELECT producto.* FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE id = ?");
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    function getProductsFromCat($id){
        $query = $this->db->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE producto.id_categoria = ? ");
        $query->execute([$id]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $products;
    }

    function addProducts($nombre, $descripcion, $precio, $id_categoria, $imagen = null){

        $pathImagen = null;

        if ($imagen){
            $pathImagen = $this->uploadImage($imagen);
        }
            
        $query = $this->db->prepare('INSERT INTO producto (descripcion, id_categoria, nombre, precio, imagen) VALUES (?,?,?,?,?)');
        $query->execute([$descripcion, $id_categoria, $nombre, $precio, $pathImagen]);
    }

    private function uploadImage($image){
        $target = 'images/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    function deleteProduct($id){
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($id));
    }

    function updateProduct($id, $nombre, $descripcion, $precio, $id_categoria, $imagen = null){

        $pathImagen = null;

        if ($imagen){
            $pathImagen = $this->uploadImage($imagen);
        }

        $query = $this->db->prepare("UPDATE producto SET descripcion=?, id_categoria=?, nombre=?,  precio=?, imagen=? WHERE id=?");
        $query->execute([$descripcion, $id_categoria, $nombre, $precio, $pathImagen, $id]);
    }

    function getProductsByPage($desde, $tamanio_pagina, $criterio){
        $query = $this->db->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id_categoria as id_categoria FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria $criterio LIMIT $desde, $tamanio_pagina");
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

