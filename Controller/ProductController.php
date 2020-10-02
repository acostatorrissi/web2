<?php

require_once './Model/ProductModel.php';
require_once './View/ProductView.php';

class ProductController{

    private $model;
    private $view;

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new ProductModel();
        $this->view = new ProductView();  
    }

    function showProducts(){
        $products = $this->model->getProducts();   
        $this->view->showProducts($products);
    }

    //iria en el mvc del usuario administrador loggeado
    function showAdminPage(){
        $id = 0;
        $products = $this->model->getProducts();
        $drinks = $this->model->getDrinks();
        $edit = false;
        $this->view->showAdminPage($products, $drinks, $edit, $id);
    }

    function showHome(){
        $this->view->showHome();
    }

    function showCompany(){
        $this->view->showCompany();
    }

    function insertProduct(){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->addProducts($nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }

    function deleteProduct($params = null){
        $id = $params[':ID'];
        $this->model->deleteProduct($id);
        header("Location: ".BASE_URL."admin");
    }


    function showAdminEditPage($params = null){
        $id = $params[':ID'];
        $products = $this->model->getProducts();
        $drinks = $this->model->getDrinks();
        $edit = true;   //bool para ver que tpl incluye smarty
        $this->view->showAdminPage($products, $drinks, $edit, $id);
        
    }

    function updateProduct(){
        $id = $_POST['id']; //lo obtengo del formulario (readonly, si le pongo disabled queda mas lindo pero no funciona)
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }
   


}

