<?php

require_once './Model/ProductModel.php';
require_once './View/ProductView.php';

class ProductController{

    private $model;
    private $view;
    private $helper;
    private $modelCategory;//ROMPEMOS RESPONSABILIDADES POR UNA RAZON VALIDA

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new ProductModel();
        $this->view = new ProductView();  
        $this->helper = new AuthHelper();
    }

    function showProducts(){
        $this->helper->startSession();
        $products = $this->model->getProducts();   
        $this->view->showProducts($products); 
    }

    function showProductDetail($params = null){
        $this->helper->startSession();
        $id = $params[':ID'];
        $product = $this->model->getProductById($id);
        $this->view->showProductDetail($product);
    }

    function showCategoryProducts($params = null){
        $this->helper->startSession();
        $id = $params[':ID'];
        $catProducts = $this->model->getProductsFromCat($id);
        $this->view->showProductsFromCat($catProducts, $id);
    } 

    function showAdminPage(){
        $this->helper->adminCheckLog();
        $this->modelCategory = new CategoryModel(); //ver preguntar en consulta
        $id = 0;
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();
        $edit = false;
        $this->view->showAdminProducts($products, $edit, $id, $categories);
    }

    function showHome(){
        $this->helper->startSession();
        $this->view->showHome();
    }

    function showCompany(){
        $this->helper->startSession();
        $this->view->showCompany();
    }

    function insertProduct(){
        $this->helper->adminCheckLog();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->addProducts($nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }

    function deleteProduct($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteProduct($id);
        header("Location: ".BASE_URL."admin");
    }

    function showAdminEditPage($params = null){
        $this->helper->adminCheckLog();
        $this->modelCategory = new CategoryModel();
        $id = $params[':ID'];
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();
        $edit = true;   //bool para ver que tpl incluye smarty
        $this->view->showAdminProducts($products, $edit, $id, $categories); 
    }

    function updateProduct(){
        $this->helper->adminCheckLog();
        $id = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }
}

