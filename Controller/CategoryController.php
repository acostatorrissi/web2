<?php

require_once './Model/CategoryModel.php';
require_once './View/CategoryView.php';


class CategoryController{

    private $model;
    private $view;
    private $helper;

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->helper = new AuthHelper();  
    }

    function showCategory(){
        $this->helper->startSession();
        $category = $this->model->getCategory();
        $this->view->showCategory($category);
    }

    function insertCategory(){
        $this->helper->adminCheckLog();
        $nombre = $_POST['nombre'];
        $urlImagen = $_POST['urlImagen'];
        $this->model->addCategory($nombre, $urlImagen);
        header("Location: ".BASE_URL."admincategory"); //falta la base
    }

    function deleteCategory($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteCategory($id);
        header("Location: ".BASE_URL."admincategory");//falta la base
    }

    function showAdminCategory(){
        $this->helper->adminCheckLog();
        $id = 0;
        $category = $this->model->getCategory();
        $edit = false;
        $this->view->showAdminCategory($category, $edit, $id);
    }

    function updateCategory(){
        $this->helper->adminCheckLog();
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $this->model->editCategory($nombre, $id);
        header("Location: ".BASE_URL."admincategory"); 
    }

    function showEditCategory($params = null){
        $this->helper->adminCheckLog();
        $id = $params[':ID'];
        $category = $this->model->getCategory();
        $edit = true;
        $this->view->showAdminCategory($category, $edit, $id);
    }
}