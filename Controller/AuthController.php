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
            $_SESSION['USSER_ROLE'] = $usser->rol; // ver esto
            $_SESSION['LAST_ACTIVITY'] = time();

            if($usser->rol == 0){
                header("Location: ".BASE_URL."carta");//ver esto
            }else{
                header("Location: ".BASE_URL."admin");//ver esto
            }
            die();
        }else{
            $error = "Credenciales invalidas";
            $this->view->showFormLogIn($error);
        }
    }

    public function showRegisterPage(){
        $this->view->showRegisterPage();
    }

    public function registerNewUsser(){

        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($name) || empty($lastName) || empty($email) || empty($password)){
            $error="Faltan datos obligatorios";
            $this->view->showRegisterPage($error);
            die();  
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->model->registerNewUsser($name, $lastName, $email, $password);
        
        header("Location: ".BASE_URL."login");  //VER ESTO
    }

    public function logOut(){
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."login");
        die();
    }
    
}