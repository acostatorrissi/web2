<?php

require_once './Model/UsserModel.php';
require_once './View/UsserView.php';

class AuthController{

    private $model;
    private $view;

    public function __construct(){
         
        $this->model = new UsserModel();
        $this->view = new UsserView();  
    }


    public function showLogin(){
        $this->view->showFormLogIn();
    }

    public function verifyUsser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)){

        }else{
            
            die();
        }

        $usser = $this->model->getUsser($email);
        if($usser && (password_verify($password, $usser->password))){
            header("Location: ".BASE_URL."admin");
        }else{
            $error = "Credenciales invalidas";
            $this->view->showFormLogIn($error);
        }
    }
}