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

    public function showUssers(){
        $this->checklog();
        $this->adminCheckLog();
        $ussers = $this->model->getUsers();
        $this->view->showUssers($ussers);

    }

    public function deleteUsser($params = null){ //VER SI ES NECESARIO VOLVER A CHECKEAR SESION
        $this->checkLog();
        $this->adminCheckLog();
        $id = $params[':ID'];
        $this->model->deleteUsser($id);
        $this->showUssers();
    }

    public function setAdminRole($params = null){
        $this->checkLog();
        $this->adminCheckLog();
        $id = $params[':ID'];
        $this->model->setAdminRole($id);
        $this->showUssers();
    }

    public function setBasicRole($params = null){
        $this->checkLog();
        $this->adminCheckLog();
        $id = $params[':ID'];
        $this->model->setBasicRole($id);
        $this->showUssers();
    }

    public function verifyUsser(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            $error="Faltan datos obligatorios";
            $this->view->showFormLogIn($error);
            die();  
        }
        $this->getUser($email, $password);
    }

    public function getUser($email, $password){

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

        $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
        $this->model->registerNewUsser($name, $lastName, $email, $passwordEncrypted);  //VER ESTO PUEDE SER INSEGURO

        $this->getUser($email, $password);
    }

    function checkLog(){
        session_start();
        if(!isset($_SESSION['USSER_ID']) || !isset($_SESSION['USSER_EMAIL']) 
            && (isset($_SESSION['LAST_ACTIVITY']))){
            header("Location: ".BASE_URL."logout"); 
            die();
        }
    }

    function adminCheckLog(){ 
        //session_start();
        if($_SESSION['USSER_ROLE'] == 0){
            header("Location: ".BASE_URL."logout"); 
            die();
        }
    }

    public function logOut(){
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."login");
        die();
    }
    
}