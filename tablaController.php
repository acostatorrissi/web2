<?php

require_once 'tablaModel.php';
require_once 'tablaView.php';

class ProductController{

    private $model;
    private $view;

    public function __construct(){
          //instancio el modelo y la vista en constructor para poder reutilizar variables
        $this->model = new ProductModel();
        $this->view = new ProductView();  
    }

    function showProductsAll(){

        //pido al modelo
        $products = $this->model->getProducts();   
    
        //actualizo la vista
        $this->view->showHeader();
        $this->view->showProducts($products);
        $this->view->showFooter();

    }


}

