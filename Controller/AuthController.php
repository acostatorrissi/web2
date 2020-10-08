<?php

require_once './Model/AuthModel.php';
require_once './View/AuthView.php';

class AuthController{

    private $model;
    private $view;

    public function __construct(){
         
        $this->model = new AuthModel();
        $this->view = new AuthView();  
    }


    public function showLogin(){
        $this->view->showFormLogIn();
    }
}