<?php

require_once './Model/CategoryModel.php';
require_once './View/CategoryView.php';


class CategoryController{

    
    private $model;
    private $view;

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new CategoryModel();
        $this->view = new CategoryView();  
    }

    function showCategory(){
        $category = $this->model->getCategory();
        $this->view->showCategory($category);
    }

    function showCategoryProducts($params = null){
        $id = $params[':ID'];
        $catProducts = $this->model->getProductsFromCat($id);
        $this->view->showProductsFromCat($catProducts, $id);
    } //falta eliminar la concatenacion de la url 
    //cuando volves a categorias u otra parte de la pagina

    function insertCategory(){
        $nombre = $_POST['nombre'];
        $this->model->addCategory($nombre);
        header("Location: ".BASE_URL."categoryadmin"); //falta la base
    }

    function deleteCategory($params = null){
        $id = $params[':ID'];
        $this->model->deleteCategory($id);
        header("Location: ".BASE_URL."categoryadmin");//falta la base
    }

    function showAdminCategory(){
        $id = 0;
        $category = $this->model->getCategory();
        $edit = false;
        $this->view->showAdminCategory($category, $edit, $id);
    }
}