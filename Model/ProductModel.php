<?php


class ProductModel{

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
        $query = $this->db->prepare("SELECT producto.*, categoria.url_imagen as img_url FROM producto JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE id = $id ");
        $query->execute();
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    function getProductsFromCat($id){
        //obtiene los productos de la bbdd por categoria
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_categoria =  $id ");
        $query->execute();
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
}

