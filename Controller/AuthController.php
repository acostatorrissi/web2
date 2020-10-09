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

        if(empty($email) || empty($password)){
            $error="Faltan datos obligatorios";
            $this->view->showFormLogIn($error);
            die();  
        }

        $usser = $this->model->getUsser($email);
        if($usser && (password_verify($password, $usser->password))){

            session_start();
           
            $_SESSION['USSER_ID'] = $usser->id;
            $_SESSION['USSER_EMAIL'] = $usser->email;

            header("Location: ".BASE_URL."admin");
        }else{
            $error = "Credenciales invalidas";
            $this->view->showFormLogIn($error);
        }
    }

    /*
    function logOut(){
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."login");
    }
    */
}