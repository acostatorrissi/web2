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

    function insertCategory(){
        $this->checkLog();
        $nombre = $_POST['nombre'];
        $this->model->addCategory($nombre);
        header("Location: ".BASE_URL."admincategory"); //falta la base
    }

    function deleteCategory($params = null){
        $this->checkLog();
        $id = $params[':ID'];
        $this->model->deleteCategory($id);
        header("Location: ".BASE_URL."admincategory");//falta la base
    }

    function showAdminCategory(){
        $this->checkLog();
        $id = 0;
        $category = $this->model->getCategory();
        $edit = false;
        $this->view->showAdminCategory($category, $edit, $id);
    }

    function updateCategory(){
        $this->checkLog();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $this->model->editCategory($nombre, $id);
        header("Location: ".BASE_URL."admincategory"); 
    }

    function showEditCategory($params = null){
        $this->checkLog();
        $id = $params[':ID'];
        $category = $this->model->getCategory();
        $edit = true;
        $this->view->showAdminCategory($category, $edit, $id);
    }

    //verifica si el usuario esta loggeado.
    function checkLog(){
        session_start();
        if(!isset($_SESSION['USSER_ID']) || !isset($_SESSION['USSER_EMAIL'])){
            header("Location: ".BASE_URL."login"); 
            die();
        }
        
    }

}