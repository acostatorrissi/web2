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
        //pido al modelo
        $products = $this->model->getProducts();   
        $drinks = $this->model->getDrinks(); 
        $this->view->showProducts($products, $drinks);
    }

    function showAdminPage(){
        $products = $this->model->getProducts();
        $drinks = $this->model->getDrinks();
        $edit = false;
        $this->view->showAdminPage($products, $drinks, $edit);
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

    function showAdminEditPage(){
        $products = $this->model->getProducts();
        $drinks = $this->model->getDrinks();
        $edit = true;
        $this->view->showAdminPage($products, $drinks, $edit);
    }

    function updateProduct($params = null){
        header("Location: ".BASE_URL."admin");
        $id = $params[':ID'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }
   

}

