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

    function showHome(){
        $this->view->showHome();
    }

    function showCompany(){
        $this->view->showCompany();
    }

   

}

