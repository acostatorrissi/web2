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
        
        $products = $this->model->getProducts();   
        $this->view->showProducts($products); 
    }

    function showCategoryProducts($params = null){
        $id = $params[':ID'];
        $catProducts = $this->model->getProductsFromCat($id);
        $this->view->showProductsFromCat($catProducts, $id);
    } 

    //iria en el mvc del usuario administrador loggeado
    function showAdminPage(){
        $this->modelCategory = new CategoryModel(); //ver preguntar en consulta
        $id = 0;
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory(); //ver preguntar en consulta
        //$drinks = $this->model->getDrinks(); 
        $edit = false;
        $this->view->showAdminProducts($products, $edit, $id, $categories);
        //$this->view->showAdminPage($products, $drinks, $edit, $id);
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
        $this->modelCategory = new CategoryModel();//ver preguntar en consulta
        $id = $params[':ID'];
        $products = $this->model->getProducts();
        $categories = $this->modelCategory->getCategory();//ver preguntar en consulta
        $edit = true;   //bool para ver que tpl incluye smarty
        $this->view->showAdminProducts($products, $edit, $id, $categories); 
    }

    function updateProduct(){
        $id = $_POST['id']; 
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->updateProduct($id, $nombre, $descripcion, $precio, $id_categoria);
        header("Location: ".BASE_URL."admin");
    }
   


}

