<?php

require_once './Model/ProductModel.php';
require_once './View/ProductView.php';

class ProductController{

    private $model;
    private $view;
    private $modelCategory;//ROMPEMOS RESPONSABILIDADES POR UNA RAZON VALIDA

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new ProductModel();
        $this->view = new ProductView();  
    }

    function showProducts(){
        session_start();
        $products = $this->model->getProducts();   
        $this->view->showProducts($products); 
    }

    function showProductDetail($params = null){
        session_start();
        $id = $params[':ID'];
        $product = $this->model->getProductById($id);
        $this->view->showProductDetail($product);
    }

    function showCategoryProducts($params = null){
        session_start();
        $id = $params[':ID'];
        $catProducts = $this->model->getProductsFromCat($id);
        $this->view->showProductsFromCat($catProducts, $id);
    } 

    function showAdminPage(){
        $this->checkLog();
        $this->adminCheckLog();
        $this->modelCategory = new CategoryModel(); //ver preguntar en consulta
        $id = 0;
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();
        $edit = false;
        $this->view->showAdminProducts($products, $edit, $id, $categories);
    }

    function showHome(){
        session_start();
        $this->view->showHome();
    }

    function showCompany(){
        session_start();
        $this->view->showCompany();
    }

    function insertProduct(){
        $this->checkLog();
        $this->adminCheckLog();
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->addProducts($nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }

    function deleteProduct($params = null){
        $this->checkLog();
        $this->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteProduct($id);
        header("Location: ".BASE_URL."admin");
    }

    function showAdminEditPage($params = null){
        $this->checkLog();
        $this->adminCheckLog();
        $this->modelCategory = new CategoryModel();//ver preguntar en consulta
        $id = $params[':ID'];
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();//ver preguntar en consulta
        $edit = true;   //bool para ver que tpl incluye smarty
        $this->view->showAdminProducts($products, $edit, $id, $categories); 
    }

    function updateProduct(){
        $this->checkLog();
        $this->adminCheckLog();
        $id = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }
   
    function checkLog(){
        session_start();
        if(!isset($_SESSION['USSER_ID']) || !isset($_SESSION['USSER_EMAIL']) 
            && (isset($_SESSION['LAST_ACTIVITY']))){
            header("Location: ".BASE_URL."logout"); 
            die();
        }
    }

    function adminCheckLog(){ 
        //session_start();
        if($_SESSION['USSER_ROLE'] == 0){
            header("Location: ".BASE_URL."logout"); 
            die();
        }
    }
}

